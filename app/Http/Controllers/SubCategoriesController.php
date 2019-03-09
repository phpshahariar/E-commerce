<?php

namespace App\Http\Controllers;

use App\MainCategories;
use App\SubCategories;
use Illuminate\Http\Request;
use Image;

class SubCategoriesController extends Controller
{
    public function showSubCategories(){
        $main_category = MainCategories::all();
        $sub_category = SubCategories::all();
        return view('backEnd.pages.subCategory.sub_category',[
            'main_category' => $main_category,
            'sub_categorys' => $sub_category
        ]);
    }
    protected function subCategoryValidation($request){
        $request->validate([
            'sub_category_name' => 'required',
            'main_category_id' => 'required',
            'status' => 'required',
        ]);
    }
    public function saveSubCategory(Request $request){
        $this->subCategoryValidation($request);
        $image = $request->file('image');
        $image_name = time().'_'.$image->getClientOriginalName();
        $category_image = 'category_image/';
        Image::make($image)->resize(1359,339)->save($category_image.$image_name);
        $sub_category = new SubCategories();
        $sub_category->sub_category_name = $request->sub_category_name;
        $sub_category->sub_category_name_ban = $request->sub_category_name_ban;
        $sub_category->sub_category_name_hin = $request->sub_category_name_hin;
        $sub_category->image = $category_image.$image_name;
        $sub_category->main_category_id = $request->main_category_id;
        $sub_category->status = $request->status;
        $sub_category->save();
        return redirect('/sub-categories')->with('message', 'Sub Category Saved Successfully !!!');
    }

    public function unpublishSubCategory($id){
        $sub_category = SubCategories::where('id', $id)->first();
        $sub_category->status = 2;
        $sub_category->update();
        return redirect('/sub-categories')->with('message', 'Sub Category Unpublished Successfully !!!');
    }
    public function publishSubCategory($id){
        $sub_category = SubCategories::where('id', $id)->first();
        $sub_category->status = 1;
        $sub_category->update();
        return redirect('/sub-categories')->with('message', 'Sub Category Published Successfully !!!');
    }
    public function editeSubCategory(Request $request){
        $sub_category = SubCategories::where('id', $request->id)->first();
        $data = array();
        $data['sub_cat_name'] = $sub_category->sub_category_name;
        $data['sub_cat_name_ban'] = $sub_category->sub_category_name_ban;
        $data['sub_cat_name_hin'] = $sub_category->sub_category_name_hin;
        $data['main_cat_id'] = $sub_category->main_category_id;
        $data['status'] = $sub_category->status;
        return response()->json($data);
    }
    public function updateSubCategory(Request $request){
        $this->subCategoryValidation($request);
        $sub_category = SubCategories::where('id', $request->sub_category_id)->first();
        if($request->file('image')){
            unlink($sub_category->image);
        $image = $request->file('image');
        $image_name = time().'_'.$image->getClientOriginalName();
        $category_image = 'category_image/';
        Image::make($image)->resize(1359,339)->save($category_image.$image_name);
            $sub_category->image = $category_image.$image_name;
        }
        $sub_category->sub_category_name = $request->sub_category_name;
        $sub_category->sub_category_name_ban = $request->sub_category_name_ban;
        $sub_category->sub_category_name_hin = $request->sub_category_name_hin;
        $sub_category->main_category_id = $request->main_category_id;

        $sub_category->status = $request->status;
        $sub_category->update();
        return redirect('/sub-categories')->with('message', 'Sub Category Update Successfully !!!');
    }
    public function deleteSubCategories($id){
        $sub_category = SubCategories::where('id', $id)->first();
        if($sub_category->image){
            unlink($sub_category->image);
        }
        $sub_category->delete();
        return redirect('/sub-categories')->with('messageD', 'Sub Category Deleted Successfully !!!');
    }

}
