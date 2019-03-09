<?php

namespace App\Http\Controllers;

use App\Customer;
use App\MemberCart;
use App\OrderDetail;
use App\Orders;
use App\Payment;
use App\ProductImage;
use App\Shipping;
use App\ShopperOrder;
use App\UserAdmin;
use Illuminate\Http\Request;
use Session;

class AdminController extends Controller
{
    public function showDashboard(){
        $shopper_id =  Session::get('admin_id');
        $userAdmin = UserAdmin::where('id', $shopper_id)->first();

        $baseUrl=  \request()->getBaseUrl();
        $url = env('APP_URL');


        $url =  $url.$baseUrl.'/'.$userAdmin->user_name.'_'.$userAdmin->id;
        return view('backEnd.pages.home.home', [
            'userAdmin' => $userAdmin,
            'url'       => $url
        ]);
    }
    public function showLogin(){
        return view('backEnd.pages.login');
    }
    protected function adminLoginValidation($request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    }
    public function adminLogin(Request $request){
        $this->adminLoginValidation($request);
        $user = UserAdmin::where('email', $request->email)->where('status', 1)->first();
        if($user){
            if(password_verify($request->password,$user->password)){
                Session::put('admin_id', $user->id);
                Session::put('admin_name', $user->user_name);
                Session::put('admin_role', $user->admin_role);
                return redirect('/dash-board');
            }else{

                return redirect('/login')->with('messageD', 'Enter Your Valid Password');
            }
        }else{
            Session::put('messageD','Enter Your valid Email ');
            return redirect('/login')->with('messageD', 'Enter Your Valid Email');
        }
    }
    public  function logout(Request $request){
        $request->session()->invalidate();
        return redirect('/login');
    }
    public function customerList(){
        $customers = Customer::orderBy('id', 'desk')->get();
        $memberCart = MemberCart::where('status', 1)->get();
        return view('backEnd.pages.customer-list.customer_list', [
            'customers' => $customers,
            'memberCart' => $memberCart
        ]);
    }
    public function deleteCustomer($id){
        $customer = Customer::where('id', $id)->first();
        $customer->delete();
        return redirect('/customer-list');
    }
    public function orderList(){
        if(Session::get('admin_role') == 2){
            $orders = Orders::orderBy('id', 'DESC')->where('delevery_status', 0)->get();
        }else{
////            $orders = Orders::where('status', 1)->where('shopper_id', Session::get('admin_id'))->orderBy('id', 'desk')->get();
            $orders = ShopperOrder::where('shopper_id', Session::get('admin_id'))->where('status', 1)->where('delevery_status', 0)->get();
//            $order_details = OrderDetail::where('admin_id', Session::get('admin_id'))->get();
//        $order = array();
//            foreach ($order_details as $key => $order_detail){
//                $order[$key] = $order_detail->order_id;
//            }
//            $orders = Orders::whereIn('id', $order)->where('status', 1)->orderBy('id', 'DESC')->get();
        }
        $customers = Customer::all();
        $users = UserAdmin::where('admin_role', 1)->where('status', 1)->get();
        return view('backEnd.pages.order-list.order_list',[
            'orders' => $orders,
            'customers' => $customers,
            'users'    => $users
        ]);
    }
    public function viewOrderDetails($id){
        $orderInfo = Orders::where('id', $id)->first();
        $customerInfo = Customer::where('id', $orderInfo->customer_id)->first();
        $paymentInfo  = Payment::where('order_id', $id)->first();
        if(Session::get('admin_role') == 2){
            $order_detailsInfo = OrderDetail::where('order_id', $id)->get();
        }else{
            $order_detailsInfo = OrderDetail::where('order_id', $id)->where('admin_id', Session::get('admin_id'))->get();
        }
        $shippingInfo = Shipping::where('id', $orderInfo->shipping_id)->first();
        $images = ProductImage::all();
//        return $order_detailsInfo;
       return view('backEnd.pages.order-detail.order_detail',[
           'customerInfo' => $customerInfo,
           'shippingInfo' => $shippingInfo,
           'paymentInfo'  => $paymentInfo,
           'order_detailsInfo' => $order_detailsInfo,
           'orderInfo'    => $orderInfo,
           'images'       => $images
       ]);
    }
    public function editeCustomer(Request $request){
        $customer = Customer::where('id', $request->id)->first();
        return response()->json($customer);
    }
    protected function customerUpdateValidation($request){
        $request->validate([
            'customer_name' => 'required',
            'customer_phone_number' => 'required',
            'customer_email' => 'requied | email',
            'customer_address' => 'requied',
        ]);
    }
    public function updateCustomer(Request $request){
        $this->customerUpdateValidation($request);
        $customer = Customer::where('id', $request->customer_id)->first();
        $customer->customer_name = $request->customer_name;
        $customer->customer_phone_number = $request->customer_phone_number;
        $customer->customer_email = $request->customer_email;
        $customer->customer_address = $request->customer_address;
        $customer->member_cart_id = $request->member_id;
        $customer->update();
        return redirect('/customer-list')->with('message', 'Customer List Updated Successfully');
    }
}
