<?php

namespace App\Http\Controllers;

use App\Customer;
use App\OrderDetail;
use App\Orders;
use App\Payment;
use App\Shipping;
use Illuminate\Http\Request;
use PDF;
use Session;

class InvoiceController extends Controller
{
    public function showInvoice($id){
        $orderInfo = Orders::where('id', $id)->first();
        $customerInfo = Customer::where('id', $orderInfo->customer_id)->first();
        $paymentInfo = Payment::where('order_id', $id)->first();
        $shippingInfo = Shipping::where('id', $orderInfo->shipping_id)->first();
        if (Session::get('admin_role') == 2){
            $orderDetails = OrderDetail::where('order_id', $id)->get();
        }else{
            $orderDetails = OrderDetail::where('order_id', $id)->where('admin_id', Session::get('admin_id'))->get();
        }
//        $pdf = App::make('dompdf.wrapper');
        $pdf = PDF::loadView('backEnd.pages.invoice.show_invoice',[
            'orderDetails' => $orderDetails,
            'customerInfo' =>$customerInfo,
            'paymentInfo' =>$paymentInfo,
            'shippingInfo' =>$shippingInfo,
            'orderInfo'   =>$orderInfo
        ]);
        return $pdf->stream();
//        return view('backEnd.pages.invoice.show_invoice');
    }
}
