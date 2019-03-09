<?php

namespace App\Http\Controllers;

use App\Info;
use App\Logo;
use App\SilderImage;
use Illuminate\Http\Request;
use Image;

class SettingController extends Controller
{
    public function slider(){
        $slider_image = SilderImage::orderBy('id', 'desk')->get();
        return view('backEnd.pages.slider.slider',[
            'slider_images' => $slider_image
        ]);
    }
    protected function sliderImageValidatrion($requset){
        $requset->validate([
            'slider_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'       => 'required'
        ]);
    }
    public function saveSlider(Request $request){
        $this->sliderImageValidatrion($request);
        $image_arry =  $request->file('slider_image');
        $image_arry_len = count($image_arry);
        for($i=0; $i<$image_arry_len; $i++){
            $slider_image = new SilderImage();
            $imageName    = time().$i.'_'.$image_arry[$i]->getClientOriginalName();
            $image = $image_arry[$i];
            $image_large = 'slider_image/large/';
            $image_small = 'slider_image/small/';
            Image::make($image)->resize(1180, 300)->save($image_large.$imageName);
            Image::make($image)->resize(132, 132)->save($image_small.$imageName);
            $slider_image->slider_image = $image_large.$imageName;
            $slider_image->small_image = $image_small.$imageName;
            $slider_image->status = $request->status;
            $slider_image->save();


        }
        return redirect('/slider')->with('message', 'You Have Been Added New Slider Images');
    }
    public function unpublishSlider($id){
        $slider_image = SilderImage::where('id', $id)->first();
        $slider_image->status = 2;
        $slider_image->update();
        return redirect('/slider')->with('message', 'Slider Image Unpublished Successfully');
    }
    public function publishSlider($id){
        $slider_image = SilderImage::where('id', $id)->first();
        $slider_image->status = 1;
        $slider_image->update();
        return redirect('/slider')->with('message', 'Slider Image Published Successfully');
    }
    public function deleteSlider($id){
        $slider_image = SilderImage::where('id', $id)->first();
        unlink($slider_image->slider_image);
        $slider_image->delete();
        return redirect('/slider')->with('messageD', 'Slider Image Deleted Successfully');
    }
    public function logo(){
        $logo = Logo::orderBy('id', 'DECS')->get();
        return view('backEnd.pages.logo.logo',[
            'logos' => $logo
        ]);
    }
    protected function logoValidation($request){
        $request->validate([
            'logo_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'       => 'required'
        ]);
    }
    public function saveLogo(Request $request){
        $this->logoValidation($request);
        $image = $request->file('logo_image');
        $image_name = time().'_'.$image->getClientOriginalName();
        $image_url = 'logo_image/';
        Image::make($image)->resize('180', '40')->save($image_url.$image_name);
        $logo = new Logo();
        $logo->logo_image = $image_url.$image_name;
        $logo->status = $request->status;
        $logo->save();
        return redirect('/logo')->with('message', 'Logo Uploaded Successfully !!!');
    }
    public function unpublishLogo($id){
        $logo = Logo::where('id', $id)->first();
        $logo->status = 2;
        $logo->update();
        return redirect('/logo')->with('message', 'Logo Status Unpublished Successfully !!!');
    }
    public function publishLogo($id){
        $logo = Logo::where('id', $id)->first();
        $logo->status = 1;
        $logo->update();
        return redirect('/logo')->with('message', 'Logo Status Published');
    }
    public function deleteLogo($id){
        $logo = Logo::where('id', $id)->first();
        if($logo){
            unlink($logo->logo_image);
        }
        $logo->delete();
        return redirect('/logo');
    }
    public function info(){
        $info = Info::where('id', 1)->first();
        return view('backEnd.pages.info.info',['info' => $info]);
    }
    protected function infoValidatation($request){
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required | numeric',
            'email' => 'required | email',
            'address' => 'required',
            'facebook_link' => 'required',
            'twitter_link' => 'required',
            'youtube_link' => 'required',
            'google_link' => 'required',
            'custom_description_eng' => 'required',
            'custom_description_ban' => 'required',
            'custom_description_hin' => 'required',
        ]);
    }
    public function saveInfo(Request $request){
        $info = Info::where('id', $request->id)->first();
        $info->name = $request->name;
        $info->phone_number = $request->phone_number;
        $info->email = $request->email;
        $info->address = $request->address;
        $info->facebook_link = $request->facebook_link;
        $info->twitter_link = $request->twitter_link;
        $info->youtube_link = $request->youtube_link;
        $info->google_link = $request->google_link;

        $info->custom_description_eng = $request->custom_description_eng;
        $info->custom_description_ban = $request->custom_description_ban;
        $info->custom_description_hin = $request->custom_description_hin;
        $info->update();
        return redirect('/info')->with('message', 'Information Update Successfully !!!');
    }

}
