<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Country;
use App\Customer;
use App\Division;
use App\Info;
use App\MainCategories;
use App\MemberCart;
use App\OrderDetail;
use App\Orders;
use App\Payment;
use App\Product;
use App\Product_size;
use App\ProductImage;
use App\Shipping;
use App\SilderImage;
use App\SubCategories;
use App\UserAdmin;
use Illuminate\Http\Request;
use Session;
use Cart;
use PDF;

class CustomController extends Controller
{
    protected function language(){
        $query = @unserialize (file_get_contents('http://ip-api.com/php/'));
        if ($query && $query['status'] == 'success') {
//                 return 'Hey user from ' . $query['country'] . ', ' . $query['city'] . '!';
            $location = $query;
            if($location['country'] == 'Bangladesh'){
                Session::put('lang', 'বাংলা');
            }elseif ($location['country'] == 'India'){
                Session::put('lang', 'नहीं');
            }else{
                Session::put('lang', 'English');
            }
        }
    }
    public function index(){
//        return Cart::getContent();
        if (Session::get('lang') == null){
            $this->language();
        }
        $fProducts = Product::where('special',1)->where('status', 1)->orderBy('id', 'desk')->get();
        $tsProducts = Product::where('top_sellers', 1)->where('status', 1)->orderBy('id', 'desk')->get();
        $trProducts = Product::where('top_rated', 1)->where('status', 1)->orderBy('id', 'desk')->get();
        $mainCategories = MainCategories::where('status', 1)->orderBy('id', 'desk')->get();
        $images = ProductImage::all();
        $slider_image = SilderImage::where('status', 1)->orderBy('id', 'desk')->limit(3)->get();
        return view('customTemplate.home.home',[
            'fProducts'  => $fProducts,
            'tsProducts' => $tsProducts,
            'trProducts' => $trProducts,
            'images'     => $images,
            'mainCategories' => $mainCategories,
            'slider_image'  => $slider_image
        ]);
    }
    public function productPage(){

        return view('customTemplate.product.product');
    }
    public function categoryPage($id){
        if (Session::get('lang') == null){
            $this->language();
        }
        $category_name = MainCategories::where('id', $id)->first();
        $cat_products = Product::where('main_category_id', $id)->where('status', 1)->orderBy('id', 'desk')->get();
        $sub_categories = SubCategories::where('main_category_id', $id)->orderBy('id', 'desk')->get();
        $brands = Brand::orderBy('id', 'desk')->get();
        $images = ProductImage::all();


        return view('customTemplate.category.category',[
            'products'   => $cat_products,
            'sub_categories' => $sub_categories,
            'category_name'  => $category_name,
            'brands'         => $brands,
            'images'         => $images

        ]);
    }
    public function subcategoryPage($id){
        if (Session::get('lang') == null){
            $this->language();
        }
        $sub_category_name = SubCategories::where('id', $id)->orderBy('id', 'desk')->first();
        $products = Product::where('sub_category_id', $id)->where('status', 1)->orderBy('id', 'desk')->get();
        $sub_categories = SubCategories::where('status', 1)->orderBy('id', 'desk')->get();
        $brands = Brand::orderBy('id', 'desk')->get();
        $images = ProductImage::all();


        return view('customTemplate.category.category',[
            'products'   => $products,
            'sub_categories' => $sub_categories,
            'category_name'  => $sub_category_name,
            'brands'         => $brands,
            'images'         => $images

        ]);

    }
    public function viewProductByBrand($id){
        if (Session::get('lang') == null){
            $this->language();
        }
        $brand_name = Brand::where('id', $id)->first();
        $products = Product::where('status',1)->where('product_brand', $id)->orderBy('id', 'desk')->get();
        $sub_categories = SubCategories::where('status', 1)->orderBy('id', 'desk')->get();
        $brands = Brand::orderBy('id', 'desk')->get();
        $images = ProductImage::all();
        return view('customTemplate.category.category',[
            'products'   => $products,
            'brand_name' => $brand_name,
            'sub_categories' => $sub_categories,
            'brands'         => $brands,
            'images'         => $images


        ]);
    }
    public function viewProductById($id){
        $url =  url()->current();
        $sts = 0;
        if (Session::get('lang') == null){
            $this->language();
        }
        $product  = Product::where('id', $id)->first();
        if ($product){
            $product->view_total += 1;
            $product->update();
        }
        $userAdmin = UserAdmin::where('id', $product->admin_id)->first();
        $shopper_total_sales = OrderDetail::where('admin_id', $userAdmin->id)->get();
        foreach ($shopper_total_sales as $shopper_total_sale){
            $sts += $shopper_total_sale->product_qty;
        }
        $country = Country::where('id', $userAdmin->country_id)->first();
        $division = Division::where('id', $userAdmin->division_id)->first();
        $mainCategory = MainCategories::where('id', $product->main_category_id)->first();
        $subCategory  = SubCategories::where('id', $product->sub_category_id)->first();
        $brand        = Brand::where('id', $product->product_brand)->first();
        $product_images = ProductImage::where('product_id', $id)->limit(3)->get();
        $brands       = Brand::orderBy('id', 'desk')->get();
        $sizes        = Product_size::where('product_id', $id)->get();
        $size_arry = count($sizes);
        $images       = ProductImage::where('product_id', $id)->get();

        $reletedProducts = Product::where('sub_category_id', $product->sub_category_id)->orderBy('id', 'desc')->limit(5)->get();
        $rpId = array();
        foreach ($reletedProducts as $key => $reletedProduct){
            $rpId[$key] = $reletedProduct->id;
        }
        $rp_image = ProductImage::whereIn('product_id', $rpId)->select('small_image', 'product_id')->get();

        $info = Info::where('id', 1)->first();
        //return $rp_image;

        return view('customTemplate.product.product',[
            'product'      => $product,
            'product_images'       => $product_images,
            'mainCategory' => $mainCategory,
            'subCategory'  => $subCategory,
            'brand'        => $brand,
            'brands'       => $brands,
            'sizes'        => $sizes,
            'size_arry'    => $size_arry,
            'images'       => $images,
            'shopper'      => $userAdmin,
            'country'      => $country,
            'division'     => $division,
            'sts'          => $sts,
            'reletedProducts' => $reletedProducts,
            'rp_image'     => $rp_image,
            'url'          => $url,
            'info'         => $info
        ]);
    }
    public function registerCustomer(){
        if(Session::get('customer_id')){
            return redirect('/billing');
        }else{
            return view('customTemplate.register-customer.register');
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
    public function registerNewCustomer(Request $request){
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

    public function customerLogout(Request $request){
        $request->session()->invalidate();
        return redirect('/');
    }
    protected function customerLoginValidation($request){
        $request->validate([
            'customer_email' => 'required',
            'customer_password' => 'required'
        ]);
    }
    public function customerLogin(Request $request){
        if(is_numeric($request->customer_email)){
           $customer = Customer::where('customer_phone_number', $request->customer_email)->first();
            if ($customer){
                if($customer->customer_password == $request->customer_password){
                    Session::put('customer_id', $customer->id);
                    Session::put('customer_name', $customer->customer_name);
                    return redirect('/billing');
                }else{
                    return redirect('/register-customer')->with('message', 'Enter Your Valid Password');
                }
            }else{
                return redirect('/register-customer')->with('message', 'Enter Your Valid Phone Number');
            }
        }else{
            $customer = Customer::where('customer_email', $request->customer_email)->first();
            if ($customer){
                if($customer->customer_password == $request->customer_password){
                    Session::put('customer_id', $customer->id);
                    Session::put('customer_name', $customer->customer_name);
                    return redirect('/billing');
                }else{
                    return redirect('/register-customer')->with('message', 'Enter Your Valid Password');
                }
            }else{
                return redirect('/register-customer')->with('message', 'Enter Your Valid Email');
            }
        }

    }
    public function billing(){
        if(Session::get('customer_id')){
            $customer = Customer::where('id', Session::get('customer_id'))->first();
            return view('customTemplate.register-customer.billing',['customer' => $customer]);
        }else{
            return redirect('/register-customer');
        }

    }
    protected function billingInfoValidation($request){
        $request->validate([
            'customer_name' => 'required',
            'customer_phone_number' => 'required | numeric',
            'customer_email' => 'required | email',
            'customer_address' => 'required',
        ]);
    }
    public function saveBillingInfo(Request $request){
        $this->billingInfoValidation($request);
        $customer = Customer::where('id', $request->customer_id)->first();
        $customer->customer_name = $request->customer_name;
        $customer->customer_phone_number = $request->customer_phone_number;
        $customer->customer_email = $request->customer_email;
        $customer->customer_address  = $request->customer_address;
        $customer->update();
        $customer = Customer::where('id', $customer->id)->first();
        if ($customer->member_cart_id > 0){
            $member_cart = MemberCart::where('id', $customer->member_cart_id)->first();
            Session::put('discount', $member_cart->member_cart_discount);

        }
        Session::put('billing_id', $customer->id);
        return redirect('/shipping');
    }
    public function shipping(){
        if(Session::get('billing_id')){
            $customer = Customer::where('id', Session::get('customer_id'))->first();
            $countries = Country::where('status', 1)->get();
            return view('customTemplate.register-customer.shipping', [
                'customer' => $customer,
                'countries'  => $countries
            ]);
        }else{
            return redirect('/billing')->with('message', 'You Must Full Fill Your Billing Information');
        }

    }
    public function payment(){
        if(Session::get('shipping_id')){
            return view('customTemplate.register-customer.payment');
        }else{
            return redirect('/shipping')->with('message', 'You Must Be Full Fill Your Shipping Information');
        }

    }
    public function cart(){
        if (Session::get('lang') == null){
            $this->language();
        }
        $cartContents = Cart::getContent();
        $subTotal = Cart::getSubTotal();
        Session::put('pubSubTotal', $subTotal);
        return view('customTemplate.register-customer.cart', [
            'cartContents' => $cartContents,
            'subTotal'     => $subTotal
        ]);
    }
    protected function shippingValidation($request){
        $request->validate([
            'ship_customer_name' => 'required',
            'ship_customer_phone_number' => 'required',
            'ship_customer_email' => 'required',
            'ship_country' => 'required',
            'ship_charge' => 'required',
        ]);
    }
    public function saveShipping(Request $request){
        $this->shippingValidation($request);
        $shipping = new Shipping();
        $shipping->ship_customer_name = $request->ship_customer_name;
        $shipping->customer_id = Session::get('customer_id');
        $shipping->ship_customer_phone_number = $request->ship_customer_phone_number;
        $shipping->ship_customer_email = $request->ship_customer_email;
        $shipping->ship_country = $request->ship_country;
        $shipping->ship_division = $request->ship_division;
        $shipping->ship_charge = $request->ship_charge;
        $shipping->ship_customer_address = $request->ship_customer_address;
        $shipping->save();
        Session::put('shipping_id', $shipping->id);
        Session::put('shipCharge', $request->ship_charge);
        return redirect('/payment');
    }
    public function savePayment(Request $request){
        $payment_type = $request->payment_type;
        if($payment_type == 'cash'){
            $orders = new Orders();
            $orders->customer_id = Session::get('customer_id');
            $orders->shipping_id = Session::get('shipping_id');

            if (Session::get('discount')){
                $orders->order_total = (Session::get('pubSubTotal')-(((Session::get('pubSubTotal'))*(Session::get('discount')))/100))+Session::get('shipCharge');
            }else{
                $orders->order_total = Session::get('pubSubTotal')+Session::get('shipCharge');
            }
            $orders->order_total_main =Cart::getSubTotal();
            $orders->save();
            Session::put('order_id',$orders->id);

            $payment = new Payment();
            $payment->order_id = $orders->id;
            $payment->payment_type = $payment_type;
            $payment->save();
            $cartContents = Cart::getContent();
            foreach ($cartContents as $cartContent){
                $order_detail = new OrderDetail();
                $order_detail->order_id = $orders->id;
                $order_detail->product_id = $cartContent->id;
                $order_detail->product_name = $cartContent->name;
                $order_detail->product_price = $cartContent->price;
                $order_detail->product_qty = $cartContent->quantity;
                $order_detail->product_size = $cartContent->attributes->size;
                $order_detail->admin_id  = $cartContent->attributes->admin_id;
                $order_detail->admin_name  = $cartContent->attributes->admin_name;
                $order_detail->save();
            }
            Cart::clear();
            Session::put('payment_id', 1);
            return redirect('/success');

        }elseif ($payment_type == 'card'){
            return $payment_type;
        }else{
            return $payment_type;
        }
    }
    public function success(){
        if(Session::get('customer_id') && Session::get('shipping_id') && Session::get('payment_id')){

            $order = Orders::where('id', Session::get('order_id'))->first();
            $billing_info = Customer::where('id', $order->customer_id)->first();
            $shipping_info = Shipping::where('id', $order->shipping_id)->first();
            $country   = Country::where('id', $shipping_info->ship_country)->first();
            $division   = Division::where('id', $shipping_info->ship_division)->first();
            $order_details = OrderDetail::where('order_id', $order->id)->get();
            $payment = Payment::where('order_id', $order->id)->first();
            return view('customTemplate.register-customer.seccess',[
                'order' => $order,
                'order_details' => $order_details,
                'billing_info' => $billing_info,
                'shipping_info' => $shipping_info,
                'country'  => $country,
                'division'  => $division,
                'payment'  => $payment,
            ]);
        }elseif (Session::get('customer_id') && Session::get('shipping_id')){
            return redirect('/payment');
        }elseif (Session::get('customer_id')){
            return redirect('/shipping');
        }else{
            return redirect('/customer-login');
        }

    }
    public function orderStausChack(Request $request){
        $customer = Customer::where('customer_email', $request->email)->first();
        $order    = Orders::where('id', $request->number)->where('customer_id', $customer->id)->first();
        if(isset($order)){
            echo 'Your Order Status are <strong>'.$order->order_status.'</strong>';
        }else{
            echo 'There have No Order';
        }

    }
    public function manageChargeCountry(Request $request){
        $countryCharge = Country::where('id', $request->id)->first();
        echo $countryCharge->shipping_charge;
    }
    public function manageChargeDivision(Request $request){
        $divisionCharge = Division::where('id', $request->id)->first();
        echo $divisionCharge->shipping_charge;
    }
    public function downloadInvoice($id){
        $orderInfo = Orders::where('id', $id)->first();
        $customerInfo = Customer::where('id', $orderInfo->customer_id)->first();
        $paymentInfo = Payment::where('order_id', $id)->first();
        $shippingInfo = Shipping::where('id', $orderInfo->shipping_id)->first();
        $orderDetails = OrderDetail::where('order_id', $id)->get();
        $country   = Country::where('id', $shippingInfo->ship_country)->first();
        $division   = Division::where('id', $shippingInfo->ship_division)->first();
//        $pdf = App::make('dompdf.wrapper');
        $pdf = PDF::loadView('backEnd.pages.invoice.customer_invoice',[
            'orderDetails' => $orderDetails,
            'customerInfo' =>$customerInfo,
            'paymentInfo' =>$paymentInfo,
            'shippingInfo' =>$shippingInfo,
            'orderInfo'   =>$orderInfo,
            'country'    => $country,
            'division'   => $division
        ]);
        return $pdf->stream();
//        return view('backEnd.pages.invoice.show_invoice');
    }
    public function viewAllCategories(){
        $mainCategory = MainCategories::where('status', 1)->get();
        return view('customTemplate.category.all_category', [
            'mainCategories' => $mainCategory
        ]);
    }
    public function viewSubCategory($id){
        $subCategories = SubCategories::where('status', 1)->where('main_category_id', $id)->get();
        return view('customTemplate.category.sub_category',[
            'subCategories' => $subCategories
        ]);
    }

}
