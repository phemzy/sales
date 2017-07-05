<?php

namespace App\Providers;

use App\Category;
use App\Product;
use Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // \View::share('categories', Category::all());
        // \View::share('products', Product::all());

        // if(Auth::check()){
        //     if(Auth::user()->hasTransactions())
        //     {
        //         Auth::user()->updatePlan();
        //     }
        // }
        \Cloudinary::config(array( 
          "cloud_name" => "crypto2naira", 
          "api_key" => "328753983467173", 
          "api_secret" => "hzqND4v2tKPkXs-r8mB-siWQ6lA" 
        ));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
