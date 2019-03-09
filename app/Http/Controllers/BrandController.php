<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function showBrand(){
        $brand = Brand::orderBy('id', 'DESC')->get();
        return view('backEnd.pages.brand.show_brand',['brands' => $brand]);
    }
    protected function brandValidation($request){
        $request->validate([
            'brand_name' => 'required',
            'brand_description' => 'required',
            'brand_status' => 'required',
        ]);
    }
    public function saveBrand(Request $request){
        $this->brandValidation($request);
        $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        $brand->brand_name_ban = $request->brand_name_ban;
        $brand->brand_name_hin = $request->brand_name_hin;
        $brand->brand_description = $request->brand_description;
        $brand->brand_status = $request->brand_status;
        $brand->save();
        return redirect('/show-brand')->with('message','Brand Info Saved Successfully !!!');
    }
    public function unpublishBrand($id){
        $brand = Brand::where('id', $id)->first();
        $brand->brand_status = 2;
        $brand->update();
        return redirect('/show-brand')->with('message','Brand Info Unpublish Successfully !!!');
    }
    public function publishBrand($id){
        $brand = Brand::where('id', $id)->first();
        $brand->brand_status = 1;
        $brand->update();
        return redirect('/show-brand')->with('message','Brand Info Publish Successfully !!!');
    }
    public function editeBrandById(Request $request){
        $brand = Brand::where('id', $request->id)->first();
        $data = array();
        $data['brand_name'] = $brand->brand_name;
        $data['brand_name_ban'] = $brand->brand_name_ban;
        $data['brand_name_hin'] = $brand->brand_name_hin;
        $data['brand_description'] = $brand->brand_description;
        $data['brand_status'] = $brand->brand_status;
        return response()->json($data);
    }
    public function updateBrandById(Request $request){
        $this->brandValidation($request);
        $brand = Brand::where('id',$request->brand_id)->first();
        $brand->brand_name = $request->brand_name;
        $brand->brand_name_ban = $request->brand_name_ban;
        $brand->brand_name_hin = $request->brand_name_hin;
        $brand->brand_description = $request->brand_description;
        $brand->brand_status = $request->brand_status;
        $brand->update();
        return redirect('/show-brand')->with('message','Brand Info Updated Successfully !!!');
    }
    public function deleteBrand($id){
        $brand = Brand::where('id', $id)->first();
        $brand->delete();

        return redirect('/show-brand')->with('messageD','Brand Info Deleted Successfully !!!');

    }

}
