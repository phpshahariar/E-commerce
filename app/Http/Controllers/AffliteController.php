<?php

namespace App\Http\Controllers;

use App\UserAdmin;
use App\MainCategories;
use App\ProductImage;
use App\Product;
use App\Product_size;
use App\SubCategories;
use Session;
use App\Info;
use App\Brand;
use Cart;
use App\Customer;
use Illuminate\Http\Request;

class AffliteController extends Controller
{

    public function index(){

        $products = Product::where('status', 1)->paginate(15);

        $product_id = [];
        foreach ($products as $key => $product){
            $product_id[$key] = $product->id;
        }

        $images = ProductImage::whereIn('product_id', $product_id)->get();

        $categories = MainCategories::where('status', 1)->get();
        return view('customTemplate.affiliatePage.index', [
            'products' => $products,
            'categories' => $categories,
            'images' => $images
        ]);
    }



    public function view_allflite($id){
        $user = UserAdmin::where('id', $id)->first();
        $products = Product::where('admin_id', $id)->paginate(15);

        $product_id = [];
        foreach ($products as $key => $product){
            $product_id[$key] = $product->id;
        }

        $images = ProductImage::whereIn('product_id', $product_id)->get();

        $categories = MainCategories::where('status', 1)->get();
        return view('customTemplate.afflite-index', [
            'products' => $products,
            'categories' => $categories,
            'user' => $user,
            'images' => $images
        ]);
    }

    public function view_affiliate_product($id){
        $categories = MainCategories::where('status', 1)->get();
        $products = Product::where('id', $id)->paginate(15);
        $product  = Product::where('id', $id)->first();
        $product_id = [];
        foreach ($products as $key => $product) {
            $product_id[$key] = $product->id;
        }
        $product_images = ProductImage::where('product_id', $id)->limit(3)->get();
        $mainCategory = MainCategories::where('id', $product->main_category_id)->first();
        $subCategory  = SubCategories::where('id', $product->sub_category_id)->first();
        $images = ProductImage::whereIn('product_id', $product_id)->get();
        $sizes        = Product_size::where('product_id', $id)->get();
        $size_arry = count($sizes);
        if ($product){
            $product->view_total += 1;
            $product->update();
        }
        $url =  url()->current();
        $sts = 0;
//        if (Session::get('lang') == null){
//            $this->language();
//        }
        $reletedProducts = Product::where('sub_category_id', $product->sub_category_id)->orderBy('id', 'desc')->limit(5)->get();
        $rpId = array();
        foreach ($reletedProducts as $key => $reletedProduct){
            $rpId[$key] = $reletedProduct->id;
        }
        $rp_image = ProductImage::whereIn('product_id', $rpId)->select('small_image', 'product_id')->get();

        $info = Info::where('id', 1)->first();
        return view('customTemplate.affiliatePage.afflite-product-view',compact('categories', 'products', 'images',
            'sizes', 'size_arry', 'product_images', 'mainCategory', 'subCategory','product','url','sts', 'info', 'rp_image', 'reletedProducts'
            ));
    }

    public function view_affiliate_category($id){
        $category_name = MainCategories::where('id', $id)->first();
//        $mainCategory = MainCategories::where('id', $product->main_category_id)->first();
//        $product  = Product::where('id', $id)->first();
        $cat_products = Product::where('main_category_id', $id)->where('status', 1)->orderBy('id', 'desk')->get();
        $sub_categories = SubCategories::where('main_category_id', $id)->orderBy('id', 'desk')->get();
        $categories = MainCategories::where('status', 1)->get();
        $brands = Brand::orderBy('id', 'desk')->get();
        $images = ProductImage::all();
        return view('customTemplate.affiliatePage.afflite-category-product', [
            'products'   => $cat_products,
            'sub_categories' => $sub_categories,
            'category_name'  => $category_name,
            'brands'         => $brands,
            'images'         => $images,
            'categories'    => $categories
        ]);
    }

    public function add_cart(Request $request){
        $product = Product::where('id', $request->product_id)->first();
        $adminUser = UserAdmin::where('id', $product->admin_id)->first();
        $images   = ProductImage::where('product_id', $request->product_id)->first();
        $image    = $images->small_image;
        Cart::add([
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
        ]);

        $cartContent = Cart::getContent();
        if($request->btn == 'orderNow'){
            return redirect('/register-affiliate-customer');
        }else{
            return back();
        }


    }

    public function cart_page(){

        $cartContents = Cart::getContent();
        $categories = MainCategories::where('status', 1)->get();
        $subTotal = Cart::getSubTotal();
        Session::put('pubSubTotal', $subTotal);
        return view('customTemplate.affiliatePage.cart-page', [
            'cartContents' => $cartContents,
            'subTotal'     => $subTotal,
            'categories'  => $categories
        ]);
    }

    public function register_affiliate_customer(){
        if(Session::get('customer_id')){
            return redirect('/billing');
        }else{
            return view('customTemplate.affiliatePage.register');
        }
    }

    protected function customerRegistionValidation($request){
        $request->validate([
            'customer_name' => 'required',
            'customer_phone_number' => 'required | numeric',
            'customer_email' => 'required | email',
            'customer_password' => 'required',
            'customer_confirm_password' => 'required',
        ]);
    }

    public function register_new_customer(Request $request){
        $this->customerRegistionValidation($request);
        $customer = new Customer();
        $customer->customer_name = $request->customer_name;
        $customer->customer_phone_number = $request->customer_phone_number;
        $customer->customer_email = $request->customer_email;
        $customer->customer_password = $request->customer_password;
        $customer->customer_confirm_password = $request->customer_confirm_password;
        $customer->save();
        if ($customer->id){
            Session::put('customer_id', $customer->id);
            Session::put('customer_name', $customer->customer_name);
            return redirect('/billing');
        }
    }

    protected function customerLoginValidation($request){
        $request->validate([
            'customer_email' => 'required',
            'customer_password' => 'required'
        ]);
    }

    public function login_customer(Request $request){
        if(is_numeric($request->customer_email)){
            $customer = Customer::where('customer_phone_number', $request->customer_email)->first();
            if ($customer){
                if($customer->customer_password == $request->customer_password){
                    Session::put('customer_id', $customer->id);
                    Session::put('customer_name', $customer->customer_name);
                    return redirect('/billing');
                }else{
                    return redirect('/register-affiliate-customer')->with('message', 'Enter Your Valid Password');
                }
            }else{
                return redirect('/register-affiliate-customer')->with('message', 'Enter Your Valid Phone Number');
            }
        }else{
            $customer = Customer::where('customer_email', $request->customer_email)->first();
            if ($customer){
                if($customer->customer_password == $request->customer_password){
                    Session::put('customer_id', $customer->id);
                    Session::put('customer_name', $customer->customer_name);
                    return redirect('/billing');
                }else{
                    return redirect('/register-affiliate-customer')->with('message', 'Enter Your Valid Password');
                }
            }else{
                return redirect('/register-affiliate-customer')->with('message', 'Enter Your Valid Email');
            }
        }
    }
}







