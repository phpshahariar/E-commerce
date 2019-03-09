<?php

namespace App\Http\Controllers;

use App\ShopperOrder;
use App\UserAdmin;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function viewShopperHistory($id){
        $shopper_order_total = 0;
        $admin_payment = 0;
        $shopper_orders = ShopperOrder::where('shopper_id', $id)->where('delevery_status', 1)->orderBy('id', 'desc')->get();
        $user_admin = UserAdmin::where('id', $id)->first();
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
            'admin_payment' =>$admin_payment,
            'id'  =>$id
        ]);
    }
    public function updateShopperPayment(Request $request){
        $shopper = ShopperOrder::where('id', $request->id)->first();
        $shopper->admin_commission = $request->admin_commission;
        $shopper->shopper_payable = $request->shopper_payable;
        $shopper->admin_payment_amount = $request->admin_payment_amount;
        $shopper->admin_payment = $request->admin_payment_status;
        $shopper->update();
        return redirect('/view-shopper-history/'.$shopper->shopper_id)->with('message', 'Shopper Account Update Successfully !!!');
    }
}
