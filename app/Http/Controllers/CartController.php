<?php

namespace App\Http\Controllers;

use App\PriceWithRange;
use App\Product;
use App\ProductImage;
use App\UserAdmin;
use Illuminate\Http\Request;
use Cart;
use Session;

class CartController extends Controller
{
    public function addToCart(Request $request){

        $product = Product::where('id', $request->product_id)->first();
        $adminUser = UserAdmin::where('id', $product->admin_id)->first();
        $images   = ProductImage::where('product_id', $request->product_id)->first();
        $image    = $images->small_image;
        Cart::add(array(
            'id' => $product->id,
            'name' => $product->product_name_eng,
            'price' => $product->product_price_eng,
            'quantity' => $request->product_qty,
            'attributes' => array(
                'size'   => $request->product_size,
                'image'  => $image,
                'admin_id' => $product->admin_id,
                'admin_name' => $adminUser->user_name
            )
        ));
        $cartContent = Cart::getContent();
        if($request->btn == 'orderNow'){
            return redirect('/register-customer');
        }else{
            return back();
        }


    }
    public function addToCartBan(Request $request){
        $product = Product::where('id', $request->product_id)->first();
        $adminUser = UserAdmin::where('id', $product->admin_id)->first();
        $images   = ProductImage::where('product_id', $request->product_id)->first();
        $image    = $images->small_image;
        Cart::add(array(
            'id' => $product->id,
            'name' => $product->product_name_ban,
            'price' => $product->product_price_ban,
            'quantity' => $request->product_qty,
            'attributes' => array(
                'size'   => $request->product_size,
                'image'  => $image,
                'admin_id' => $product->admin_id,
                'admin_name' => $adminUser->user_name
            )
        ));
        $cartContent = Cart::getContent();

        return back();
    }

    public function addToCartHin(Request $request){
        $product = Product::where('id', $request->product_id)->first();
        $adminUser = UserAdmin::where('id', $product->admin_id)->first();
        $images   = ProductImage::where('product_id', $request->product_id)->first();
        $image    = $images->small_image;
        Cart::add(array(
            'id' => $product->id,
            'name' => $product->product_name_hin,
            'price' => $product->product_price_hin,
            'quantity' => $request->product_qty,
            'attributes' => array(
                'size'   => $request->product_size,
                'image'  => $image,
                'admin_id' => $product->admin_id,
                'admin_name' => $adminUser->user_name
            )
        ));
        $cartContent = Cart::getContent();

        return back();
    }


    public function removeCart(Request $request){
        Cart::remove($request->id);
        $subTotal = Cart::getSubTotal();
        return response()->json($subTotal);
    }
    public function updateCart(Request $request){
        $price = PriceWithRange::where('product_id', $request->product_id)
           ->where('price_first_number', '<=', $request->product_qty)
           ->where('price_last_number', '>=', $request->product_qty)
            ->first();
        if($price){
            Cart::update($request->product_id, array(
                'price' => $price->first_to_last_number_price,
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->product_qty
                ),
            ));
        }else{
            Cart::update($request->product_id, array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->product_qty
                ),
            ));
        }
        Session::put('pubSubTotal', Cart::getSubTotal());
        return back();
    }
    public function updateCartBlur(Request $request){
        $product = Product::where('id', $request->id)->select('product_qty')->first();
        if($request->qty > $product->product_qty){
            $price = PriceWithRange::where('product_id', $request->id)
                ->where('price_first_number', '<=', $request->qty)
                ->where('price_last_number', '>=', $request->qty)
                ->first();
            if($price){
                Cart::update($request->id, array(
                    'price' => $price->first_to_last_number_price,
                    'quantity' => array(
                        'relative' => false,
                        'value' => $product->product_qty
                    ),
                ));
//            echo $price->first_to_last_number_price;
            }else{
                Cart::update($request->id, array(
                    'quantity' => array(
                        'relative' => false,
                        'value' => $product->product_qty
                    ),
                ));
            }

        }else{
            $price = PriceWithRange::where('product_id', $request->id)
                ->where('price_first_number', '<=', $request->qty)
                ->where('price_last_number', '>=', $request->qty)
                ->first();
            if($price){
                Cart::update($request->id, array(
                    'price' => $price->first_to_last_number_price,
                    'quantity' => array(
                        'relative' => false,
                        'value' => $request->qty
                    ),
                ));
//            echo $price->first_to_last_number_price;
            }else{
                Cart::update($request->id, array(
                    'quantity' => array(
                        'relative' => false,
                        'value' => $request->qty
                    ),
                ));
            }

        }

        Session::put('pubSubTotal', Cart::getSubTotal());
        echo $request->id;
    }

}
