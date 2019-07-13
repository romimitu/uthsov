<?php

namespace App\Http\Controllers;
use File;
use DB;
use App\Product;
use App\Category;
use App\Size;
use App\Image;
use App\Color;
use App\Brand;
use App\ProductDetail;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:product-list');
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $data = Product::with('category','brand','color','image','productDetail')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.product.index', compact('data'));
    }

    public function create()
    {
        $category=Category::orderBy('created_at', 'desc')->get();
        $sizes=Size::orderBy('created_at', 'desc')->get();
        $colors=Color::orderBy('created_at', 'desc')->get();
        $brands=Brand::orderBy('created_at', 'desc')->get();
        return view('admin.product.create', compact('category','sizes','colors','brands'));
    }

    public function store(ProductRequest $request)
    {
        $product = Product::create([
            'cat_id' => request()->input('cat_id'),
            'title' => request()->input('title'),
            'description' => request()->input('description'),
            'sku' => request()->input('sku'),
            'brand_id' => request()->input('brand_id'),
            'color_id' => request()->input('color_id'),
            'in_stock' => request()->input('in_stock'),
        ]);
        foreach ($request->sizes as $key=>$data) {
            $data = new ProductDetail();
            $data->product_id = $product->id;
            $data->size_id = $request->sizes[$key];
            $data->purchase_price = $request->purchaseprices[$key];
            $data->sales_price = $request->salesprices[$key];
            $data->less_amt = $request->lessamts[$key];
            $data->save();
        }


        foreach ($request->files as $image) {
            foreach ($image as $key => $data) {
                $data = $request->file('files')[$key];
                $data->move('uploads/product/', $data->getClientOriginalName());
                Image::create([
                    'product_id' => $product->id,
                    'image' => $data->getClientOriginalName()
                ]);
            }
        }
        Session::flash('message','Added  Successfully');
        return redirect('/products');
    }

    public function show($id)
    {

    }
    public function edit(Product $product)
    {
        $category=Category::orderBy('created_at', 'desc')->get();
        $sizes=Size::orderBy('created_at', 'desc')->get();
        $colors=Color::orderBy('created_at', 'desc')->get();
        $brands=Brand::orderBy('created_at', 'desc')->get();
        $product = Product::with('category','brand','color','image','productDetail')->find($product->id);
        return view('admin.product.edit', compact('product','category','sizes','colors','brands'));
    }

    public function update(ProductRequest $request, product $product)
    {
        $product = Product::whereId($product->id)->update([
            'cat_id' => request()->input('cat_id'),
            'title' => request()->input('title'),
            'description' => request()->input('description'),
            'sku' => request()->input('sku'),
            'brand_id' => request()->input('brand_id'),
            'color_id' => request()->input('color_id'),
            'in_stock' => request()->input('in_stock'),
        ]);
        
        if ($request->sizes){
            $rows = DB::table('product_details')->where('product_id', $request->product_id);
            $rows->delete();
            foreach ($request->sizes as $key=>$data) {
                $data = new ProductDetail();
                $data->product_id = $request->product_id;
                $data->size_id = $request->sizes[$key];
                $data->purchase_price = $request->purchaseprices[$key];
                $data->sales_price = $request->salesprices[$key];
                $data->less_amt = $request->lessamts[$key];
                $data->save();
            }
        }

        if ($request->hasFile('files')){
            foreach ($request->files as $image) {
                foreach ($image as $key => $data) {
                    $data = $request->file('files')[$key];
                    $data->move('uploads/product/', $data->getClientOriginalName());
                    Image::create([
                        'product_id' => $request->product_id,
                        'image' => $data->getClientOriginalName()
                    ]);
                }
            }
        }
        Session::flash('message', 'Succesfully updated');
        return redirect('/products');
    }

    public function destroy(Product $product)
    {
        foreach($product->image as $key=>$image){
            $image=$product->image[$key]->image;
            $image_path = public_path().'/uploads/product/'.$image;

            if(File::exists($image_path)) {
                File::delete($image_path);
            }
        }
        $product->delete();
        Session::flash('message', 'Successfully Deleted');
        return redirect('/products');
    }


    public function imageDestroy(Request $request)
    {
        if(isset($request->id)){
            $todo = Image::findOrFail($request->id);
            $image=$todo->image;

            $image_path = public_path().'/uploads/product/'.$image;
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            $todo->delete();
            return response(['msg' => 'Image deleted', 'status' => 'success']);
        }
    }


    public function productData($id)
    {
        $data = DB::table('product_details')
            ->join('products', 'products.id', '=', 'product_details.product_id')
            ->join('sizes', 'product_details.size_id', '=', 'sizes.id')
            ->join('brands', 'brands.id', '=', 'products.brand_id')
            ->join('colors', 'colors.id', '=', 'products.color_id')
            ->select('product_details.id','title','product_id','sales_price', 'sizes.name as size','size_id','brands.name as brand','colors.name as color','purchase_price','sales_price','less_amt')
            ->where('product_details.id', '=', $id)
            ->get();
        return response()->json($data);
    }
}
