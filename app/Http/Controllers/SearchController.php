<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Country;
use App\Customer;
use App\District;
use App\Division;
use App\Dynamicpage;
use App\Expense;
use App\ExtraIncome;
use App\MainCategories;
use App\MemberCart;
use App\Orders;
use App\Product;
use App\Product_size;
use App\ProductImage;
use App\ShopperOrder;
use App\SubCategories;
use App\SubDistrict;
use App\UserAdmin;
use Illuminate\Http\Request;
use Session;
use DB;

class SearchController extends Controller
{
    protected function searchProduct($searchData, $select){
        $main_category_id = MainCategories::orwhere('category_name', 'like', '%' . $searchData . '%')->first();
        if($main_category_id){
            $main_category_id = $main_category_id->id;
        }else{
            $main_category_id = ' ';
        }
        $sub_category_id = SubCategories::where('sub_category_name', 'like', '%' . $searchData . '%')->first();
        if($sub_category_id){
            $sub_category_id = $sub_category_id->id;
        }else{
            $sub_category_id = ' ';
        }
        $brand_id       =  Brand::where('brand_name', 'like', '%' . $searchData . '%')->first();
        if($brand_id){
            $brand_id = $brand_id->id;
        }else{
            $brand_id = ' ';
        }
        if($select == 0 ){
            $product = Product::where('status', 1)
                ->orwhere('product_name_eng', 'like', '%' . $searchData . '%')
                ->orwhere('product_name_hin', 'like', '%' . $searchData . '%')
                ->orwhere('product_name_ban', 'like', '%' . $searchData . '%')
                ->orwhere('product_qty', 'like', '%' . $searchData . '%')
                ->orwhere('ex_date', 'like', '%' . $searchData . '%')
                ->orwhere('product_price_eng', 'like', '%' . $searchData . '%')
                ->orwhere('product_price_ban', 'like', '%' . $searchData . '%')
                ->orwhere('product_price_hin', 'like', '%' . $searchData . '%')
                ->orwhere('product_short_description_eng', 'like', '%' . $searchData . '%')
                ->orwhere('prodcut_short_description_ban', 'like', '%' . $searchData . '%')
                ->orwhere('product_short_description_hin', 'like', '%' . $searchData . '%')
                ->orwhere('prodcut_long_description_eng', 'like', '%' . $searchData . '%')
                ->orwhere('prodcut_long_description_ban', 'like', '%' . $searchData . '%')
                ->orwhere('product_long_description_hin', 'like', '%' . $searchData . '%')
                ->orwhere('product_color_eng', 'like', '%' . $searchData . '%')
                ->orwhere('product_color_ban', 'like', '%' . $searchData . '%')
                ->orwhere('product_color_hin', 'like', '%' . $searchData . '%')
                ->orwhere('main_category_id',$main_category_id)
                ->orwhere('sub_category_id',$sub_category_id)
                ->orwhere('product_brand',$brand_id)
                ->get();
        }else{
            $product = Product::where('product_name_eng', 'like', '%' . $searchData . '%')
                ->get();
        }

        return $product;
}
    public function search(Request $request){
        $select = 0;
        $searchData = $request->search_front;
        $image = ProductImage::all();
        $categories = MainCategories::where('status', 1)->get();
        $brands = Brand::where('brand_status', 1)->get();
        $product = $this->searchProduct($searchData, $select);
        return view('customTemplate.search.search',[
            'products' => $product,
            'images' => $image,
            'categories' => $categories,
            'brands' => $brands
        ]);

    }
    public function searchGet(){
        return redirect('/');
    }
    public function searchSuggestion(Request $request){
        $searchData = $request->name;
       $product = Product::where('status', 1)
           ->orwhere('product_name_eng', 'like', '%' . $searchData . '%')
           ->orwhere('product_name_hin', 'like', '%' . $searchData . '%')
           ->orwhere('product_name_ban', 'like', '%' . $searchData . '%')
           ->select('product_name_eng', 'product_name_hin', 'product_name_ban')
           ->limit(5)
           ->get();
      return response()->json($product);
    }
    public function searchBackProduct(Request $request){
        $select = 1;
        $searchData = $request->searchBack;
        $product_image = ProductImage::all();
        $categories = MainCategories::where('status', 1)->get();
        $brands = Brand::where('brand_status', 1)->get();
        $products = $this->searchProduct($searchData, $select);
        $product_size = Product_size::all();
        $offers = Dynamicpage::orderBy('id', 'DESC')->get();
        return view('backEnd.pages.product.product', [
            'categories' => $categories,
            'brands' => $brands,
            'products' => $products,
            'product_images' => $product_image,
            'product_size' => $product_size,
            'offers' => $offers,
        ]);

    }
    public function searchBackOrderList(Request $request){
        if(Session::get('admin_role') == 2){
            $orders = Orders::where('id', $request->searchBack)->where('delevery_status', 0)->get();
        }else{
            $orders = ShopperOrder::where('order_id', $request->searchBack)->where('shopper_id', Session::get('admin_id'))->where('status', 1)->where('delevery_status', 0)->get();
        }
        $customers = Customer::all();
        $users = UserAdmin::where('admin_role', 1)->where('status', 1)->get();
        return view('backEnd.pages.order-list.order_list',[
            'orders' => $orders,
            'customers' => $customers,
            'users'    => $users
        ]);
    }
    public function searchBackDeliveryOrder(Request $request){
        if(Session::get('admin_role') == 2){
            $orders = Orders::where('id', $request->searchBack)->where('delevery_status', 1)->get();
        }else{
            $orders = ShopperOrder::where('order_id', $request->searchBack)->where('shopper_id', Session::get('admin_id'))->where('status', 1)->where('delevery_status', 1)->get();
        }
        $customers = Customer::all();
        $users = UserAdmin::where('admin_role', 1)->where('status', 1)->get();
        return view('backEnd.pages.order-list.order_list',[
            'orders' => $orders,
            'customers' => $customers,
            'users'    => $users
        ]);
    }
    public function searchShopperOrderList(Request $request){
        $customers = Customer::all();
        $users = UserAdmin::where('admin_role', 1)->where('status', 1)->get();
        $orders = ShopperOrder::where('shopper_id', $request->searchBack)->where('delevery_status', 0)->get();
        return view('backEnd.pages.order-list.order_list_shopper_for_admin',[
            'orders' => $orders,
            'customers' => $customers,
            'users'    => $users
        ]);
    }
    public function searchShopperDeleveryList(Request $request){
        $delevery = 0;
        $customers = Customer::all();
        $users = UserAdmin::where('admin_role', 1)->where('status', 1)->get();
        $orders = ShopperOrder::where('shopper_id', $request->searchBack)->where('delevery_status', 1)->get();
        return view('backEnd.pages.order-list.order_list_shopper_for_admin',[
            'orders' => $orders,
            'customers' => $customers,
            'users'     => $users,
            'delevery'  => $delevery
        ]);
    }
    public function searchCustomer(Request $request){
        $searchData = $request->searchBack;
        $customers = Customer::where('id', $request->searchBack)
            ->orwhere('customer_name', 'like', '%' . $searchData . '%')
            ->orwhere('customer_phone_number', 'like', '%' . $searchData . '%')
            ->orwhere('customer_email', 'like', '%' . $searchData . '%')
            ->orwhere('customer_address', 'like', '%' . $searchData . '%')
            ->get();
        $memberCart = MemberCart::where('status', 1)->get();
        return view('backEnd.pages.customer-list.customer_list', [
            'customers' => $customers,
            'memberCart' => $memberCart
        ]);
    }
    public function searchUser(Request $request){
        $searchData = $request->searchBack;
        $user_admins = DB::table('user_admins')
            ->where('user_name', 'like', '%' . $searchData . '%')
            ->orwhere('phone', 'like', '%' . $searchData . '%')
            ->orwhere('email', 'like', '%' . $searchData . '%')
            ->join('divisions', 'user_admins.division_id', '=', 'divisions.id')
            ->join('districts', 'user_admins.district_id', '=', 'districts.id')
            ->join('sub_districts', 'user_admins.sub_district_id', '=', 'sub_districts.id')
            ->select('user_admins.*', 'divisions.division_name','districts.district_name','sub_districts.sub_district_name')
            ->orderBy('id', 'DESC')
            ->get();
        $divistions = Division::where('status', 1)->get();
        $districts = District::where('status', 1)->get();
        $sub_districts = SubDistrict::where('status', 1)->get();
        $countries = Country::all();
        return view('backEnd.pages.register_user.register_user',[
            'divisions' => $divistions,
            'districts' => $districts,
            'sub_districts' => $sub_districts,
            'user_admins' => $user_admins,
            'countries' => $countries,
        ]);
    }
    public function searchcountry(Request $request){
//        return $request->searchBack;
        $searchData = $request->searchBack;
        $countries = Country::where('country_name', 'like', '%' . $searchData . '%')->get();
        return view('backEnd.pages.country.country',['countries' => $countries]);
    }
    public function searchDivision(Request $request){
        $searchData = $request->searchBack;
        $divisions = Division::where('division_name', 'like', '%' . $searchData . '%')->get();
        $countries = Country::orderBy('id', 'DESC')->get();
        return view('backEnd.pages.division.division',[
            'divisions' => $divisions,
            'countries' => $countries,
        ]);
    }
    public function searchMemberCart(Request $request){
        $searchData = $request->searchBack;
        $memberCarts = MemberCart::where('member_cart_name', 'like', '%' . $searchData . '%')
                     ->orwhere('member_cart_number', 'like', '%' . $searchData. '%')
                     ->get();
        return view('backEnd.pages.memberCart.member_cart',[
            'memberCarts' => $memberCarts,
        ]);
    }
    public function searchExtraIncome(Request $request){
        $searchData = $request->searchBack;
        $extraIncomes = ExtraIncome::where('income_name', 'like', '%' . $searchData . '%')
            ->orwhere('income_amount', 'like', '%' . $searchData . '%')
            ->get();
        return view('backEnd.pages.extraIncome.extraIncome',[
            'extraIncomes' => $extraIncomes
        ]);
    }
    public function searchExpense(Request $request){
        $searchData = $request->searchBack;
        $expenses =Expense::where('expense_name', 'like', '%' . $searchData . '%')
            ->orwhere('expense_amount', 'like', '%' . $searchData . '%')
            ->get();
        return view('backEnd.pages.expense.expense',[
            'expenses' => $expenses
        ]);

    }
    public function searchByDateShopperHistory(Request $request){

        $shopper_order_total = 0;
        $admin_payment = 0;
        $shopper_orders = ShopperOrder::where('created_at', '>=', $request->start_date)
            ->where('created_at', '<=', $request->end_date)
            ->where('delevery_status', 1)
            ->orderBy('id', 'desc')
            ->where('shopper_id', $request->user_id)
            ->get();
        $user_admin = UserAdmin::where('id', $request->user_id)->first();
        foreach ($shopper_orders as $shopper_order){
            $shopper_order_total += $shopper_order->order_total;
            $admin_payment +=$shopper_order->admin_payment_amount;
        }
        $shopper_order_total_commission = ($shopper_order_total*$user_admin->commission_rate)/100;
        $shopper_payable = $shopper_order_total - $shopper_order_total_commission;

        return view('backEnd.pages.shopper_history.shopper_history',[
            'shopper_orders' => $shopper_orders,
            'user_admin' => $user_admin,
            'shopper_payable' => $shopper_payable,
            'admin_payment' =>$admin_payment
        ]);

    }
}
