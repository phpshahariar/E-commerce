<?php

namespace App\Http\Controllers;

use App\Country;
use App\District;
use App\Division;
use App\EventImage;
use App\Product;
use App\ProductImage;
use App\SubDistrict;
use App\UserAdmin;
use Illuminate\Http\Request;
use Session;
class ShopperController extends Controller
{
    public function shopperRegister(){
        $countries = Country::all();
        $divisions = Division::all();
        $districts = District::all();
        $subdistricts = SubDistrict::all();
        return view('customTemplate.shopper-page.shopper_register',[
            'countries' => $countries,
            'divisions' => $divisions,
            'districts' => $districts,
            'subdistricts' => $subdistricts
        ]);
    }
    protected function saveShopperValidation($request){
        $request->validate([
            'user_name' => 'required',
            'email' => 'required | email',
            'phone' => 'required | numeric',
            'password' => 'required',
            'address' => 'required',
            'country_id' => 'required',
            'division_id' => 'required',
            'sub_district_id' => 'required',
        ]);
    }
    public function saveShopper(Request $request){
        $this->saveShopperValidation($request);
        $user_admin = new UserAdmin();
        $user_admin->user_name = $request->user_name;
        $user_admin->email = $request->email;
        $user_admin->phone = $request->phone;
        $user_admin->password = bcrypt($request->password);
        $user_admin->address = $request->address;
        $user_admin->country_id = $request->country_id;
        $user_admin->division_id = $request->division_id;
        $user_admin->district_id = $request->district_id;
        $user_admin->sub_district_id = $request->sub_district_id;

        $user_admin->admin_role = 1;
        $user_admin->status = 0;
        $user_admin->save();
        return redirect('/shopper-register')->with('message', 'You are Successfully Apply To Be a Shopper!!');
    }
    public function shopperLogin(){
        return view('customTemplate.shopper-page.shopper_login');
    }
    protected function adminLoginValidation($request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    }
    public function shopperLoginDashboard(Request $request){
        $this->adminLoginValidation($request);
        $user = UserAdmin::where('email', $request->email)->where('status',1)->first();
        if($user){
            if(password_verify($request->password,$user->password)){
                Session::put('admin_id', $user->id);
                Session::put('admin_name', $user->user_name);
                Session::put('admin_role', $user->admin_role);
                return redirect('/dash-board');
            }else{

                return redirect('/shopper-login')->with('message', 'Enter Your Valid Password');
            }
        }else{
            Session::put('message','Enter Your valid Email ');
            return redirect('/shopper-login')->with('message', 'Enter Your Valid Email');
        }
    }
    public function shopperDashboard(){
        return view('customTemplate.shopper-page.shopper_dashboard');
    }
    public function shopperProduct($id){
        $products = Product::where('status', 1)->where('admin_id', $id)->get();
        $products_id = array();
        foreach ($products as $key => $product){
            $products_id[$key] = $product->id;
        }
        $images = ProductImage::whereIn('product_id', $products_id)->get();
        $eventImage = EventImage::where('status', 1)->orderBy('id', 'desc')->first();

        $user = UserAdmin::where('id', $id)->first();
        return view('customTemplate.offerPage.offerPage',[
            'products' => $products,
            'images'   => $images,
            'user'     => $user,
//            'eventImage' => $eventImage
        ]);
    }
    public function shopperUrl($name, $id){
        $products = Product::where('status', 1)->where('admin_id', $id)->get();
        $images = ProductImage::all();
        $user = UserAdmin::where('id', $id)->first();
        $division = Division::where('id', $user->division_id)->select('division_name')->first();
        $country = Country::where('id', $user->country_id)->select('country_name')->first();
        return view('customTemplate.shopperPage.shopperPage',[
            'products' => $products,
            'images'   => $images,
            'user'     => $user,
            'division' => $division,
            'country'  => $country
        ]);
;    }
}
