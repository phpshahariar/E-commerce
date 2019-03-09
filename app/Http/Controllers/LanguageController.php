<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class LanguageController extends Controller
{
    public function langBangla(){
        Session::forget('lang');
        Session::put('lang', 'বাংলা');
        return redirect()->back();
    }
    public function langHindi(){
        Session::forget('lang');
        Session::put('lang', 'नहीं');
        return redirect()->back();
    }
    public function langEnglish(){
        Session::forget('lang');
        Session::put('lang', 'English');
        return redirect()->back();
    }
}
