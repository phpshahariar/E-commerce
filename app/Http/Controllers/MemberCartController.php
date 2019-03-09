<?php

namespace App\Http\Controllers;

use App\MemberCart;
use Illuminate\Http\Request;
use Cart;
use Session;

class MemberCartController extends Controller
{
    public $publicSubTotal;

    public function memberCart(){
        $memberCarts = MemberCart::orderBy('id', 'desk')->get();
        return view('backEnd.pages.memberCart.member_cart',[
            'memberCarts' => $memberCarts,
        ]);
    }
    public function saveMember(Request $request){
        $memberCart = new MemberCart();
        $memberCart->member_cart_name = $request->member_cart_name;
        $memberCart->member_cart_number = $request->member_cart_number;
        $memberCart->member_cart_discount = $request->member_cart_discount;
        $memberCart->status = $request->status;
        $memberCart->save();
        return redirect('/member-cart')->with('message', 'Member Cart Save Succssfully!!!');
    }
    public function publishMemberCart($id){
        $memberCart = MemberCart::where('id', $id)->first();
        $memberCart->status = 1;
        $memberCart->save();
        return redirect('/member-cart')->with('member', 'Member Cart Have Been Published Successfully');
    }
    public function unpublishMemberCart($id){
        $memberCart = MemberCart::where('id', $id)->first();
        $memberCart->status = 0;
        $memberCart->save();
        return redirect('/member-cart')->with('member', 'Member Cart Have Been Unpublished Successfully');
    }
    public function editeMemberCart(Request $request){
        $memberCart = MemberCart::where('id', $request->id)->first();
        return response()->json($memberCart);
    }
    public function updateMemberCart(Request $request){
        $memberCart = MemberCart::where('id', $request->member_cart_id)->first();
        $memberCart->member_cart_name = $request->member_cart_name;
        $memberCart->member_cart_number = $request->member_cart_number;
        $memberCart->member_cart_discount = $request->member_cart_discount;
        $memberCart->status = $request->status;
        $memberCart->update();
        return redirect('/member-cart')->with('message', 'Member Cart Update Successfully !!!');
    }
    public function deleteMemberCart($id){
        $memberCart = MemberCart::where('id', $id)->first();
        $memberCart->delete();
        return redirect('/member-cart')->with('messageD', 'Member Cart Deleted Succussfully');
    }
    public function memberCartDiscount(Request $request){
        $subTotal = Cart::getSubTotal();
        $memberCart = MemberCart::where('member_cart_number',$request->id)->first();
        if($memberCart){
            $discount_rate = $memberCart->member_cart_discount;
            $discountAmount = ($subTotal/100)*$discount_rate;
            $subTotal = $subTotal-$discountAmount;
//            $this->publicSubTotal = $subTotal;
            $this->publicSubTotal =$subTotal;
            $sub = $this->publicSubTotal;
            Session::put('pubSubTotal', $sub);
            echo $sub;
    }else{
            $this->publicSubTotal = Cart::getSubTotal();
            $sub = $this->publicSubTotal;
            Session::put('pubSubTotal', $sub);
            echo $sub;
        }
    }
}
