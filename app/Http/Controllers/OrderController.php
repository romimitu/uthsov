<?php

namespace App\Http\Controllers;
use DB;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class OrderController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:order-list');
         $this->middleware('permission:order-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:order-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $data = Order::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.order.index', compact('data'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {
        $data = [];
        $data['order'] = Order::with(['products', 'products.product','products.product.productDetail.size'])->findOrFail($id);
        return view('admin.order.view', $data);
    }
    public function edit(Order $order)
    {
        $data = [];
        $data['order'] = Order::with(['products', 'products.product','products.product.productDetail.size'])->findOrFail($order->id);

        //dd($data['order']->toArray());
        return view('admin.order.edit', ['order'=>$data['order']]);

    }

    public function update(Request $request, order $order)
    {
        if(request()->input('payment_status') == 'Paid'){
            $paidAmt = $order->total_amount + $order->shipping_fee;
        }else{
            $paidAmt = 0;
        }
        $orders = Order::whereId($order->id)->update([
            'paid_amount' => $paidAmt,
            'payment_status' => request()->input('payment_status'),
            'operational_status' => request()->input('operational_status'),
            'processed_by' => auth()->user()->id,
        ]);

        //dd($order);
        session()->flash('message', 'Order Update successfully.');
        return redirect('/orders');

    }

    public function destroy(Order $order)
    {
        $order->delete();
        Session::flash('message', 'Successfully Deleted');
        return redirect('/orders');
    }

}
