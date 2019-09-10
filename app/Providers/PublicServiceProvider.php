<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class PublicServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('frontend.layouts.slider','App\Http\ViewComposer\PublicComposer@getSlider');
        View::composer('frontend.home','App\Http\ViewComposer\PublicComposer@getFeatures');
        View::composer('frontend.home','App\Http\ViewComposer\PublicComposer@getProduct');
        View::composer('frontend.home','App\Http\ViewComposer\PublicComposer@getBlog');
        View::composer('frontend.home','App\Http\ViewComposer\PublicComposer@getTrendProduct');
        View::composer('frontend.layouts.quickcart','App\Http\ViewComposer\PublicComposer@getQuickCart');
        View::composer('frontend.layouts.profile-sidebar','App\Http\ViewComposer\PublicComposer@getUser');
        View::composer('frontend.layouts.sidebar','App\Http\ViewComposer\PublicComposer@getCategory');
        View::composer('frontend.home','App\Http\ViewComposer\PublicComposer@getCategory');
        View::composer('frontend.home','App\Http\ViewComposer\PublicComposer@getTrendProduct');
        View::composer(['frontend.layouts.header', 'frontend.layouts.footer', 'frontend.pages.about', 'frontend.pages.contact-us', 'frontend.checkout'],'App\Http\ViewComposer\PublicComposer@aboutInfo');
    }

    public function register()
    {

    }
}
