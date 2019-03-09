<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;

class BkeController extends Controller
{
    public function index(){
        $products = Product::where('status', 1)->limit(5)->get();
        $product_images = ProductImage::all('medium_image', 'product_id');
        return view('frontEndOne.home.home', ['products' => $products, 'images' => $product_images]);
    }
    public function details(){
        return view('frontEndOne.details.details');
    }
    public function categories(){
        return view('frontEndOne.categories.categories');
    }
    public function order(){
        return view('frontEndOne.checkout.order');
    }
    public function customerLogin(){
        return view('frontEndOne.checkout.customer-login');
    }
    public function address(){
        return view('frontEndOne.checkout.address');
    }
    public function shipping(){
        return view('frontEndOne.checkout.shipping');
    }
    public function payment(){
        return view('frontEndOne.checkout.payment');
    }

}
