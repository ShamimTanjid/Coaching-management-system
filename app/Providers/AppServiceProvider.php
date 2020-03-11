<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;
use App\HeaderFooter;
use DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       Schema::defaultStringLength(191);

       View::composer('Admin.includes.header',function($view){
        $headerr = DB::table('header_footers')->first();
        $view->with(['headerr'=>$headerr,
    ]);
       });


       View::composer('Admin.includes.footer',function($view){
        $footer = HeaderFooter::find(2);
        $view->with('footer',$footer);
       });
    }
}
