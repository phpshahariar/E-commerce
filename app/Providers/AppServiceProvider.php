<?php

namespace App\Providers;

use App\Brand;
use App\Dynamicpage;
use App\Info;
use App\Logo;
use App\MainCategories;
use App\Product;
use App\ProductImage;
use App\SubCategories;
use Illuminate\Support\ServiceProvider;
use phpDocumentor\Reflection\Location;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('customTemplate.include.header.index', function ($view) {

            $mainCategories = MainCategories::where('status', 1)->get();
            $view->with('mainCategories',  $mainCategories);
        });
        view()->composer('customTemplate.index', function ($view) {

            $dynamicpage = Dynamicpage::where('status', 1)->orderBy('id', 'desc')->limit(2)->get();
            $view->with('dynamicpages',  $dynamicpage);
        });
        view()->composer('customTemplate.index', function ($view) {

           $logo = Logo::where('status', 1)->orderBy('id', 'DECS')->first();
            $view->with('logo',  $logo);
        });

        view()->composer('customTemplate.index', function ($view){
            $products = Product::where('status', 1)->orderBy('id', 'desk')->get();
            $view->with('products', $products);
        });
        view()->composer('customTemplate.index', function ($view){
            $info = Info::where('id', 1)->first();
            $view->with('info', $info);
        });

        view()->composer('customTemplate.index', function ($view){
            $images = ProductImage::all();
            $view->with('images', $images);
        });


        view()->composer('customTemplate.include.header.index', function ($view) {
            $subCategories = SubCategories::where('status', 1)->get();

            $view->with('subCategoriesApp',  $subCategories);
        });

         view()->composer('customTemplate.include.header.index', function ($view) {
            $query = @unserialize (file_get_contents('http://ip-api.com/php/'));
             if ($query && $query['status'] == 'success') {
//                 return 'Hey user from ' . $query['country'] . ', ' . $query['city'] . '!';
                 $location = $query;

             }

            $view->with('location',  $location);
        });



        view()->composer('customTemplate.include.footer.index', function ($view) {
            $brands = Brand::where('brand_status', 1)->get();
            $view->with('brands',  $brands);
        });
        view()->composer('customTemplate.include.footer.index', function ($view) {
            $mainCategories = MainCategories::where('status', 1)->get();
            $view->with('mainCategories',  $mainCategories);
        });
      view()->composer('customTemplate.include.recentlyView.index', function ($view) {
            $products = Product::where('status', 1)->orderBy('id', 'desk')->get();
            $view->with('products',  $products);
        });




        view()->composer('backEnd.pages.product.product', function ($view) {

            $subCategories = SubCategories::where('status', 1)->get();

            $view->with('subCategories',  $subCategories);
        });
        view()->composer('backEnd.pages.dashBoard', function ($view) {
            $logo = Logo::where('status', 1)->orderBy('id', 'DECS')->first();
            $view->with('logo',  $logo);
        });
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
