<?php

namespace App\Http\Controllers;

use App\Product;
use App\Order;
use App\OrderProduct;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Input;
use DB;
use Auth;
use App\User;
use GuzzleHttp\Client;
use App\Mail\OrderSubmit;
use Mail;

class CartController extends Controller
{
    public function showCart()
    {
        $data = [];
        $data['cart'] = session()->has('cart') ? session()->get('cart') : [];
        $data['total'] = array_sum(array_column($data['cart'], 'total_price'));
        return view('frontend.cart', $data);
    }
    public function addToCart(Request $request)
    {
        $product = DB::table('product_details')
            ->join('products', 'products.id', '=', 'product_details.product_id')
            ->join('images', 'products.id', '=', 'images.product_id')
            ->join('sizes', 'product_details.size_id', '=', 'sizes.id')
            ->join('brands', 'brands.id', '=', 'products.brand_id')
            ->join('colors', 'colors.id', '=', 'products.color_id')
            ->select('product_details.id','title','image','products.id as product_id','sales_price', 'sizes.name as size','size_id','brands.name as brand','colors.name as color','purchase_price','sales_price','less_amt')
            ->distinct()
            ->where('product_details.product_id', '=', $request->product_id)
            ->where('product_details.size_id', '=', $request->size_id)
            ->get();

        $cart = session()->has('cart') ? session()->get('cart') : [];
        if (array_key_exists($product[0]->id, $cart)) {
            $cart[$product[0]->id]['quantity']++;
            $cart[$product[0]->id]['total_price']=$cart[$product[0]->id]['quantity']*$cart[$product[0]->id]['sale_price'];
        } else {
            $cart[$product[0]->id] = [
                'id' => $product[0]->id,
                'product_id' => $product[0]->product_id,
                'title' => $product[0]->title,
                'image' => $product[0]->image,
                'size' => $product[0]->size,
                'size_id' => $product[0]->size_id,
                'quantity' => 1,
                'price' => $product[0]->sales_price,
                'lessamt' => $product[0]->less_amt,
                'sale_price' => $product[0]->sales_price - $product[0]->less_amt,
                'total_price' => $product[0]->sales_price - $product[0]->less_amt,
            ];
        }
        session(['cart' => $cart]);
        $data = [];
        $data['cart'] = session()->has('cart') ? session()->get('cart') : [];
        return response()->json($data);
    }

    public function removeFromCart(Request $request)
    {
        $cart = session()->has('cart') ? session()->get('cart') : [];
        unset($cart[$request->input('product_id')]);
        session(['cart' => $cart]);
        $data = [];
        $data['cart'] = session()->has('cart') ? session()->get('cart') : [];
        return response()->json($data);
    }
    public function clearCart()
    {
        session(['cart' => []]);
        return redirect()->back();
    }
    
    public function checkout()
    {
        $otp = session()->has('otp') ? session()->get('otp') : [];
        if(Auth::check() || !empty($otp)) {
            $data = [];
            $data['cart'] = session()->has('cart') ? session()->get('cart') : [];
            $data['total'] = array_sum(array_column($data['cart'], 'total_price'));
            $data['city'] = DB::table('shipments')->distinct()->select('city')->get();
            return view('frontend.checkout', $data);
        }else{
            return redirect('/account-login');
        }
    }


    public function getShippingFee(Request $request)
    {
        $data = DB::table('shipments')
            ->select('fee')
            ->where('city', '=', $request->id)
            ->get();
        return response()->json($data);
    }


    public function processOrder()
    {
        $validator = Validator::make(request()->all(), [
            'customer_name' => 'required',
            'customer_mobile' => 'required|min:11|max:15',
            'address' => 'required',
            'city' => 'required',
            'accept-terms' =>'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if(Input::has('register')){
            $validator = Validator::make(request()->all(), [
                'customer_mobile' => 'required|min:11|max:15|unique:users,mobile',
                'customer_email' => 'required|unique:users,email',
                'password'=> 'required_if:password,on|min:6',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $member = User::create([
                'name' => request()->input('customer_name'),
                'email' => request()->input('customer_email'),
                'mobile' => request()->input('customer_mobile'),
                'password' => bcrypt(request()->input('password')),
            ]);
            $user=$member->id;
        }elseif(Auth::check()) {
            $user=auth()->user()->id;
        }else{
            $user=0;
        }
        
        $cart = session()->has('cart') ? session()->get('cart') : [];
        $total = array_sum(array_column($cart, 'total_price'));
        $lastid = DB::table('orders')->pluck('id')->last()+1;
        $invoiceid =now()->format('ymd').$lastid;
        //dd(now()->toArray());
        $order = Order::create([
            'user_id' => $user,
            'invoice_no' => str_pad($invoiceid + 1, 10, "0", STR_PAD_LEFT),
            'customer_name' => request()->input('customer_name'),
            'customer_mobile' => request()->input('customer_mobile'),
            'customer_email' => request()->input('customer_email'),
            'address' => request()->input('address'),
            'city' => request()->input('city'),
            'total_amount' => $total,
            'shipping_fee' => request()->input('shippingfee'),
            'paid_amount' => 0,
            'payment_details' => 'cash on delivery',
        ]);
        foreach ($cart as $product_id => $product) {
            $order->products()->create([
                'product_id' => $product['product_id'],
                'quantity' => $product['quantity'],
                'price' => $product['sale_price'],
            ]);
        }


        $inv =$order->invoice_no;
        $name =$order->customer_name;
        $mobile ='+88'.$order->customer_mobile;
        $amt =$order->total_amount;
        $fee = $order->shipping_fee;
        $total = $amt+$fee;
        $msg= "Dear $name, your order has been submitted successfully. invoice value $total tk and invoice no $inv. For more info http://uthsov.com";

        $client = new Client();
        $res = $client->request('POST', 'http://www.bangladeshsms.com/smsapi', [
            'form_params' => [
                "api_key" => "R60006925d052a0da7d402.89734832 ",
                "senderid" => "8804445629107",
                "type" => "text",
                "msg" => $msg,
                "contacts" => $mobile
            ]
        ]);
        if($order->customer_email!=null){
            Mail::to($order->customer_email)->cc(env('MAIL_FROM_ADDRESS'))->send(new OrderSubmit($order));
        }
        session()->forget(['cart']);
        session()->forget(['otp']);
        session()->flash('message', 'Order placed successfully.');
        return redirect()->route('order.details', $order->id);
    }

    public function showOrder($id)
    {
        $data = [];
        $data['order'] = Order::with(['products', 'products.product','products.product.productDetail.size'])->findOrFail($id);
        //dd($data['order']->toArray());
        return view('frontend.orders.details', $data);
    }

    public function orderList()
    {
        $data = Order::orderBy('created_at', 'desc')->where('user_id', Auth()->user()->id)->paginate(10);
        //dd($data);
        return view('frontend.orders.order-list', compact('data'));
    }


    public function cancelOrder($id)
    {
        $orders = Order::whereId($id)->update([
            'operational_status' => 'cancel',
        ]);
        session()->flash('message', 'Order Update successfully.');
        //return redirect()->route('order.details', $order->id);
        return redirect('/order-list');

    }
}