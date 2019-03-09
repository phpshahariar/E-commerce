<?php

namespace App\Http\Controllers;

use App\Customer;
use App\OrderDetail;
use App\Orders;
use App\Payment;
use App\Product;
use App\ProductImage;
use App\Shipping;
use App\ShopperOrder;
use App\UserAdmin;
use Illuminate\Http\Request;
use Session;

class OrderController extends Controller
{
    public function successOrder($id){
//        $order = Orders::where('id', $id)->first();
//        $order->order_status = 'Success';
//        $order->update();

        if(Session::get('admin_role') == 2){
            $order = Orders::where('id', $id)->first();
            $order->order_status = 'Success';
            $order->delevery_status = 1;
            $order->update();
        }else{
            $shopper_order = ShopperOrder::where('order_id', $id)->where('shopper_id', Session::get('admin_id'))->first();
            $shopper_order->order_status = 'Success';
            $shopper_order->delevery_status = 1;
            $shopper_order->update();
        }
        return back();
    }
    public function pendingOrder($id){
        if(Session::get('admin_role') == 2){
            $order = Orders::where('id', $id)->first();
            $order->order_status = 'Pending';
            $order->delevery_status = 0;
            $order->update();
        }else{
            $shopper_order = ShopperOrder::where('order_id', $id)->where('shopper_id', Session::get('admin_id'))->where('status', 1)->first();
            $shopper_order->order_status = 'Pending';
            $shopper_order->delevery_status = 0;
            $shopper_order->update();
        }

        return back();
    }
    protected function orderSendToShopperValidation($request){
        $request->validate([
           'status' => 'required | numeric'
        ]);
    }

    public function orderSendToShopper(Request $request){
        if($request->status == 0){
            $shopperOrder = ShopperOrder::where('order_id', $request->order_id)->get();
            $shopperOrder_arry = count($shopperOrder);
            if ($shopperOrder_arry > 0){
                for ($i=0; $i<$shopperOrder_arry; $i++){
                    $shopperOrder[$i]->delete();
                }
                $order = Orders::where('id', $request->order_id)->first();
                $order->status = 0;
                $order->update();
                return redirect('/order-list')->with('messageD', 'This Order Remove From Shopper Order List');
            }else{
                return redirect('/order-list')->with('message', 'This Order Not Listed in Shopper Order List');
            }

        }else{
            $shopperOrder_check = ShopperOrder::where('order_id', $request->order_id)->get();
            $shopperOrder_check_arry = count($shopperOrder_check);
            if($shopperOrder_check_arry > 0){
                return redirect('/order-list')->with('messageD', 'This Order Already Send To Shopper');
            }else{
                $order = Orders::where('id', $request->order_id)->first();
                $order->status = $request->status;
                $order->update();
                $order_details = OrderDetail::where('order_id', $request->order_id)->get();
                foreach ($order_details as $order_detail){
                    $products_price = $order_detail->product_qty*$order_detail->product_price;
                    $shopper_up = ShopperOrder::where('order_id', $request->order_id)->where('shopper_id', $order_detail->admin_id)->first();

                    if($shopper_up){
                        $shopper_up->order_total += $products_price;
                        $shopper_up->update();
                    }else{
                        $shopperOrder = new ShopperOrder();
                        $shopperOrder->order_id = $request->order_id;
                        $shopperOrder->shopper_id = $order_detail->admin_id;
                        $shopperOrder->customer_id = $order->customer_id;
                        $shopperOrder->shipping_id = $order->shipping_id;
                        $shopperOrder->order_total = $products_price;
                        $shopperOrder->order_status = $order->order_status;
                        $shopperOrder->status = $request->status;
                        $shopperOrder->save();
                    }

                }

                return redirect('/order-list')->with('message', 'You have Been Successfully Send Order To Shopper');
            }
        }


    }
    public function deleteOrder($id){
        if(Session::get('admin_role') == 2){
            $order = Orders::where('id', $id)->first();
            $order_details = OrderDetail::where('order_id', $id)->get();
            $order_details_arry = count($order_details);
            for ($i=0; $i<$order_details_arry; $i++){
                $order_details[$i]->delete();
            }
            $shopper_order = ShopperOrder::where('order_id', $id)->get();
            $shopper_order_arry = count($shopper_order);
            for ($i=0; $i<$shopper_order_arry; $i++){
                $shopper_order[$i]->delete();
            }

            $shipping = Shipping::where('id', $order->shipping_id)->first();
            $shipping->delete();
            $payment = Payment::where('order_id', $id)->first();
            $payment->delete();
            $order->delete();
        }else{
            $order = ShopperOrder::where('order_id', $id )->where('shopper_id', Session::get('admin_id'))->first();
            $order->status = 0;
            $order->update();
        }

        return redirect('/order-list')->with('messageD', 'You have Been Successfully Deleted This Order');
    }
    public function viewShopperOrder($id){
        $searchHide = 0;
        $customers = Customer::all();
        $users = UserAdmin::where('admin_role', 1)->where('status', 1)->get();
        $orders = ShopperOrder::where('order_id', $id)->get();
        return view('backEnd.pages.order-list.order_list_shopper_for_admin', [
            'orders' => $orders,
            'customers' => $customers,
            'users'    => $users,
            'searchHide' => $searchHide
        ]);
    }
    public function viewOrderDetailsShopperForAdmin($id){
        $orderInfo =ShopperOrder::where('order_id', $id)->first();
        $customerInfo = Customer::where('id', $orderInfo->customer_id)->first();
        $paymentInfo = Payment::where('order_id', $id)->first();
        $shippingInfo = Shipping::where('id', $orderInfo->shipping_id)->first();
        $images = ProductImage::all();
        $order_detailsInfo = OrderDetail::where('order_id', $id)->where('admin_id', $orderInfo->shopper_id )->get();
        return view('backEnd.pages.order-detail.order_detail_shopper_for_admin',[
            'customerInfo' => $customerInfo,
            'shippingInfo' => $shippingInfo,
            'paymentInfo'  => $paymentInfo,
            'order_detailsInfo' => $order_detailsInfo,
            'orderInfo'    => $orderInfo,
            'images'       => $images
        ]);

    }
    public function deleveryOrder(){
        if(Session::get('admin_role') == 2){
            $orders = Orders::orderBy('id', 'DESC')->where('delevery_status', 1)->get();
        }else{
            $orders = ShopperOrder::where('shopper_id', Session::get('admin_id'))->where('status', 1)->where('delevery_status', 1)->get();
        }
        $customers = Customer::all();
        $users = UserAdmin::where('admin_role', 1)->where('status', 1)->get();
        $delevery = 1;
        return view('backEnd.pages.order-list.order_list',[
            'orders' => $orders,
            'customers' => $customers,
            'users'    => $users,
            'delevery'    => $delevery,
        ]);
    }
    public function shopperOrderList(){
        $customers = Customer::all();
        $users = UserAdmin::where('admin_role', 1)->where('status', 1)->get();
        $orders = ShopperOrder::where('delevery_status', 0)->get();
        return view('backEnd.pages.order-list.order_list_shopper_for_admin',[
            'orders' => $orders,
            'customers' => $customers,
            'users'    => $users
        ]);
    }
    public function shopperDeleveredList(){
        $delevery = 0;
        $customers = Customer::all();
        $users = UserAdmin::where('admin_role', 1)->where('status', 1)->get();
        $orders = ShopperOrder::where('delevery_status', 1)->get();
        return view('backEnd.pages.order-list.order_list_shopper_for_admin',[
            'orders' => $orders,
            'customers' => $customers,
            'users'    => $users,
            'delevery' => $delevery
        ]);
    }
    protected function customerValidation($request){
        $request->validate([
            'customer_name' => 'required',
            'customer_phone_number' => 'required | numeric',
            'customer_email' => 'required | email' ,
            'customer_address' => 'required',
        ]);
    }
    public function customerUpdateFormOrderDetails(Request $request){
        $this->customerValidation($request);
       $customer = Customer::where('id', $request->customer_id)->first();
       $customer->customer_name = $request->customer_name;
       $customer->customer_phone_number = $request->customer_phone_number;
       $customer->customer_email = $request->customer_email;
       $customer->customer_address = $request->customer_address;
       $customer->update();
       return back()->with('message', 'customer Info Updated Successfully');
    }
    protected function shippingValidation($request){
        $request->validate([
            'ship_customer_name' => 'required',
            'ship_customer_phone_number' => 'required | numeric',
            'ship_customer_email' => 'required | email',
            'ship_customer_address' => 'required',
        ]);
    }


    public function shippingUpdateFormOrderDetails(Request $request){
        $this->shippingValidation($request);
        $shippinInfo = Shipping::where('id', $request->ship_customer_id)->first();
        $shippinInfo->ship_customer_name = $request->ship_customer_name;
        $shippinInfo->ship_customer_phone_number = $request->ship_customer_phone_number;
        $shippinInfo->ship_customer_email = $request->ship_customer_email;
        $shippinInfo->ship_customer_address = $request->ship_customer_address;
        $shippinInfo->update();
        return back()->with('message', 'Shipping Info Updated Successfully');
    }
    protected function paymentValidation($request){
        $request->validate([
            'payment_type' => 'required',
            'payment_status' => 'required'
        ]);
    }

    public function paymentUpdateFormOrderDetails(Request $request){
        $this->shippingValidation($request);
        $payment = Payment::where('id', $request->payment_id)->first();
        $payment->payment_type = $request->payment_type;
        $payment->payment_status = $request->payment_status;
        $payment->update();
        return back()->with('message', 'customer Info Updated Successfully');
    }
    protected function productQtyValidation($request){
        $request->validate([
            'product_qty' => 'required | numeric'
        ]);
    }
    public function productUpdateFormOrderDetails(Request $request){
        $this->productQtyValidation($request);
        $orderDeatil = OrderDetail::where('id', $request->product_id)->first();
        $orderDeatil->product_qty = $request->product_qty;
        $orderDeatil->update();
        return back()->with('message', 'Product Info Updated Successfully');
    }
    public function deleteProductFormOrder($id){
        $order_details = OrderDetail::where('id', $id)->first();
        $order_details->delete();
        return back();
    }
    public function updateOrderDetails(Request $request){
        $order_details = OrderDetail::where('id', $request->id)->first();
        $order_details->product_qty = $request->product_qty;
        $order_details->update();
        return back()->with('message', 'Product Qty Update Successfully !!!');
    }
}
