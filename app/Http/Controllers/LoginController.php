<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Session;

class LoginController extends Controller
{
    public function redirectToFacebookProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }


    public function handleProviderFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
        $customer = Customer::where('customer_email', $user->email)->first();
        if ($customer){
            Session::put('customer_id', $customer->id);
            Session::put('customer_name', $customer->customer_name);
            return redirect('/billing');
        }else{
            if ($user){
                $customer = new Customer();
                $customer->customer_name = $user->name;
                $customer->customer_phone_number = 0;
                $customer->customer_email = $user->email;
                $customer->customer_password = '123456';
                $customer->customer_confirm_password = '123456';
                $customer->save();
                Session::put('customer_id', $customer->id);
                Session::put('customer_name', $user->name);
                return redirect('/billing');
            }else{
                return redirect('/register-customer')->with('message', 'Invalid Login');
            }
        }


    }
}
