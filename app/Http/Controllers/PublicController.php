<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use App\Product;
use App\Category;
use App\Size;
use App\Blog;
use DB;
use Carbon\Carbon;
use Auth;
use App\User;
use App\OtpVerify;

class PublicController extends Controller
{

    public function ProductSearch(Request $request)
    {
        $products = Product::with('category','brand','color','image','productDetail', 'productDetail.size')
        ->where('status', 1)
        ->where('title', 'like', '%' . Input::get('search') . '%')
        ->orderBy('created_at', 'desc')
        ->paginate(12);
        return view('frontend.product', ['products' => $products]);
     }

    public function getProducts()
    {
        $products = Product::with('category','brand','color','image','productDetail', 'productDetail.size')
        ->where('status', 1)
        ->orderBy('created_at', 'desc')
        ->paginate(12);
        //dd($products);
        return view('frontend.product', compact('products'));
    }
    
    public function getProductbyCategory($id, $slug)
    {
        $products = Product::with('category','brand','color','image','productDetail', 'productDetail.size')
        ->where('cat_id', $id)
        ->where('status', 1)
        ->orderBy('created_at', 'desc')->paginate(12);
        return view('frontend.product', compact('products'));
    }

    public function singleProduct($id, $slug)
    {
        $sizes = DB::table('product_details')
            ->select('*')
            ->join('sizes', 'product_details.size_id', '=', 'sizes.id')
            ->where('product_details.product_id', '=', $id)
            ->get();
        //dd($sizes);
        $item = Product::find($id);
        $products = Product::where('cat_id',$item->cat_id)->with('category','brand','color','image','productDetail')->orderBy('created_at', 'desc')->paginate(4);
        return view('frontend.single-product', compact('item','sizes','products'));
    }


    public function getproductBySize(Request $request)
    {
        $data = DB::table('product_details')
            ->select('*')
            ->where('product_details.product_id', '=', $request->product_id)
            ->where('product_details.size_id', '=', $request->size_id)
            ->get();
        return response()->json($data);
    }


    public function blogPost()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(12);
        return view('frontend.blog', compact('blogs'));
    }
    public function singleBlog($id, $slug)
    {
        $blog = Blog::findOrfail($id);
        return view('frontend.singleblog', compact('blog'));
    }

    public function orderTutsPage()
    {
        return view('frontend.pages.how-to-order');
    }
    public function termsConditionsPage()
    {
        return view('frontend.pages.terms-condition');
    }
    public function nextDayPolicyPage()
    {
        return view('frontend.pages.next-day-policy');
    }
    public function aboutUs()
    {
        return view('frontend.pages.about');
    }
    public function otpVerify()
    {
        if(session()->has('cart')){
            if(Auth::check()) {
            return redirect('/checkout');
            }else{
                return view('frontend.pages.otp-verify');
            }
        }else{
            return view('frontend.cart');
        }
    }
    public function sendOtp(Request $request)
    {
        $data = OtpVerify::create([
            'mobile' => request()->input('mobile'),
            'code' => request()->input('code'),
        ]);
        return response()->json($data);
    }
    public function getOtpCode(Request $request)
    {
        $data = DB::table('otp_verifies')
            ->select('*')
            ->where('otp_verifies.mobile', '=', $request->mobile)
            ->where('otp_verifies.code', '=', $request->code)
            ->where('otp_verifies.verified_at', '=', null)
            ->get();
        return response()->json($data);
    }
    public function updateOtp(Request $request)
    {
        $id=request()->input('id');
        $data = OtpVerify::whereId($id)->update([
            'status' => 'verified',
            'verified_at' => Carbon::now(),
        ]);
        session(['otp' => $data]);
        return response()->json($data);
    }
}

