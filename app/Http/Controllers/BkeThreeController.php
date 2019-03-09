<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;

class BkeThreeController extends Controller
{
    public function index(){
        $nproducts = Product::where('status', 1)->orderBy('id', 'desk')->limit(3)->get();
        $nproducts2 = Product::where('status', 1)->orderBy('id', 'desk')->skip(3)->limit(3)->get();

        $fproducts = Product::where('special',1)->where('status', 1)->orderBy('id', 'desk')->limit(3)->get();
        $fproducts2 = Product::where('special',1)->where('status', 1)->orderBy('id', 'desk')->skip(3)->limit(3)->get();

        $topProducts = Product::where('top_rated', 1)->where('status', 1)->orderBy('id', 'desk')->limit(3)->get();
        $topProducts2 = Product::where('top_rated', 1)->where('status', 1)->orderBy('id', 'desk')->skip(3)->limit(3)->get();

        $topSellProducts = Product::where('top_sellers', 1)->where('status', 1)->orderBy('id', 'desk')->limit(3)->get();
        $topSellProducts2 = Product::where('top_sellers', 1)->where('status', 1)->orderBy('id', 'desk')->skip(3)->limit(3)->get();

        $hotProducts = Product::where('hot_product', 1)->where('status', 1)->orderBy('id', 'desk')->limit(3)->get();
        $hotProducts2 = Product::where('hot_product', 1)->where('status', 1)->orderBy('id', 'desk')->skip(3)->limit(3)->get();



        $images = ProductImage::all();
//        return $fproducts2;
        return view('frontEndThree.home.home',[
            'nproducts' => $nproducts,
            'nproducts2' => $nproducts2,
            'images' => $images,
            'fproducts' => $fproducts,
            'fproducts2' => $fproducts2,
            'topProducts' => $topProducts,
            'topProducts2' => $topProducts2,
            'topSellProducts' => $topSellProducts,
            'topSellProducts2' => $topSellProducts2,
            'hotProducts' => $hotProducts,
            'hotProducts2' => $hotProducts2,
        ]);
    }
    public function quiekViewById(Request $request){
        $product = Product::where('id', $request->id)->first();
//        echo $product->id;
        return response()->json($product);
    }
    public function productPage($id){
        $product = Product::where('id', $id)->first();
        return view('frontEndThree.product_page.product_page',['product' => $product]);
    }
    public function categoryPage(){
        return view('frontEndThree.category_page.category_page');
    }
}
