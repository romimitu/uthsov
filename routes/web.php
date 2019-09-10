<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {return view('frontend.home');});

Auth::routes(['verify' => false]);

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
	Route::resource('category','CategoryController');
	Route::resource('shipments','ShipmentController');
	Route::resource('sliders','SliderController');
	Route::resource('features','FeatureController');
	Route::resource('products','ProductController');
    Route::delete('imagedelete','ProductController@imageDestroy');
	Route::resource('brands','BrandController');
	Route::resource('colors','ColorController');
	Route::resource('sizes','SizeController');
	Route::resource('orders','OrderController');
	Route::resource('blogs','BlogController');
	Route::resource('photos','PhotoController');
	Route::resource('abouts','AboutController');
	Route::resource('user/profile','UserDetailsController');
    Route::get('/order-list', 'CartController@orderList')->name('order.list');
    Route::patch('/order-list/{id}', 'CartController@cancelOrder')->name('order.cancel');
    Route::get('/productdata/{id}', 'ProductController@productData');
});

// Public Route
Route::post('/q/product', 'PublicController@ProductSearch');

Route::get('/shop', 'PublicController@getProducts')->name('shop.page');
Route::get('/productBySize', 'PublicController@getproductBySize')->name('itemby.size');
Route::get('/product/{id}/{slug}', 'PublicController@singleProduct');
Route::get('/cart', 'CartController@showCart')->name('cart.show');
Route::get('/getzone', 'CartController@getZone')->name('get.zone');
Route::get('/zonedetails', 'CartController@getShippingFee')->name('shipping.fee');
Route::post('/cart', 'CartController@addToCart')->name('cart.add');
Route::post('/cart/remove', 'CartController@removeFromCart')->name('cart.remove');
Route::get('/cart/clear', 'CartController@clearCart')->name('cart.clear');
Route::get('/checkout', 'CartController@checkout')->name('cart.checkout');
Route::post('/order', 'CartController@processOrder')->name('order');
Route::get('/order/{id}', 'CartController@showOrder')->name('order.details');


Route::get('/custom-order', 'PublicController@customOrder')->name('custom.order');
Route::get('/our-blog', 'PublicController@blogPost')->name('blog');
Route::get('/our-blog/{id}/{slug}', 'PublicController@singleBlog');
Route::resource('contact-us','ContactController');


Route::get('/category-product/{id}/{slug}', 'PublicController@getProductbyCategory');


Route::get('/how-to-order', 'PublicController@orderTutsPage');
Route::get('/terms-conditions', 'PublicController@termsConditionsPage');
Route::get('/next-day-policy', 'PublicController@nextDayPolicyPage');
Route::get('/about-us', 'PublicController@aboutUs');
Route::get('/photo-gallery', 'PublicController@photoGallery');

Route::get('/account-login', 'PublicController@otpVerify');
Route::post('/sendotp', 'PublicController@sendOtp');
Route::get('/getotpcode', 'PublicController@getOtpCode');
Route::post('/updateopt', 'PublicController@updateOtp');