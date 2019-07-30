<?php
namespace App\Http\ViewComposer;

use App\Slider;
use App\Feature;
use App\Product;
use App\Blog;
use App\User;
use App\Category;
use Illuminate\View\View;
use DB;
use Auth;
class PublicComposer
{
    public function getSlider(View $view)
    {
        $sliders = Slider::orderBy('created_at', 'desc')->paginate(1);
        $view->with('sliders', $sliders);
    }

    public function getBlog(View $view)
    {
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(2);
        $view->with('blogs', $blogs);
    }

    public function getFeatures(View $view)
    {
        $features = Feature::orderBy('created_at', 'desc')->get();
        $view->with('features', $features);
    }
    public function getProduct(View $view)
    {
        $products = Product::with('category','brand','color','image','productDetail')
        ->where('status', 1)
        ->orderBy('created_at', 'desc')->get();
        //dd($products);
        $view->with('products', $products);
    }
    
    
    public function getTrendProduct(View $view)
    {
        $trendproducts = Product::with('category','brand','color','image','productDetail')
        ->where('status', 1)
        ->inRandomOrder()
        ->get();
        //dd($products);
        $view->with('trendproducts', $trendproducts);
    }
    
    public function getQuickCart(View $view)
    {
        $data = [];
        $data['cart'] = session()->has('cart') ? session()->get('cart') : [];
        $data['total'] = array_sum(array_column($data['cart'], 'total_price'));
        $view->with($data);
    }


    public function getTrendProducts(View $view)
    {
        $trendingItem = DB::select("SELECT SUM(quantity) as qty, a.product_id, b.title, c.image, ss.sales_price
                        FROM order_products as a
                        Left join products as b ON b.id=a.product_id
                        Left join images as c ON c.product_id=a.product_id
                        LEFT JOIN product_details AS ss ON (ss.product_id = a.product_id) 
                            WHERE ss.sales_price = (SELECT MAX(sales_price)
                            FROM product_details AS ss2 WHERE ss2.product_id = a.product_id)
                        Group by a.product_id, b.title, c.image, ss.sales_price
                        order by qty DESC");
        $view->with('trendingItem', $trendingItem);
    }


    public function getUser(View $view)
    {
        $user = User::with('userDetails')->findOrFail(Auth::user()->id);
        $view->with('user', $user);
    }



    public function getCategory(View $view)
    {
        $categories = Category::where('parent_id', '=', 0)
        ->where('status', 1)
        ->get();
        $allCategories = DB::table('categories')
        ->where('status', 1)
        ->where('child_status', 1)
        ->inRandomOrder()
        ->paginate(8);
        //$cat = Category::with('childs')->get()->toArray();
        //dd($allCategories);
        $view->with('categories', $categories)->with('allCategories', $allCategories);
    }
}
