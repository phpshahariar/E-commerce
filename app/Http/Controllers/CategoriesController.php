<?php

namespace App\Http\Controllers;

use App\MainCategories;
use Illuminate\Http\Request;
use Image;

class CategoriesController extends Controller
{
    public function showMainCategories(){
        $main_categories = MainCategories::orderBy('id','DESC')->get();
        return view('backEnd.pages.categories.main_categories',['main_categories' => $main_categories]);
    }
    protected function mainCategoryValidation($request){
        $request->validate([
            'category_name' => 'required',
            'category_description' => 'required',
            'image'  => 'required',
            'status' => 'required',
        ]);
    }
    public function saveMainCategories(Request $request){
        $this->mainCategoryValidation($request);
        $image = $request->file('image');
        $image_name = $image->getClientOriginalName();
        $category_image = 'category_image/';
        Image::make($image)->resize(1359,339)->save($category_image.$image_name);
        $main_category = new MainCategories();
        $main_category->category_name = $request->category_name;
        $main_category->category_name_ban = $request->category_name_ban;
        $main_category->category_name_hin = $request->category_name_hin;
        $main_category->image = $category_image.$image_name;
        $main_category->category_description = $request->category_description;
        $main_category->status = $request->status;
        $main_category->save();
       return redirect('/main-categories')->with('message', 'Main Category Saved Successfully !!!');

    }
    public function publishCategory($id){
        $main_category = MainCategories::where('id', $id)->first();
        $main_category->status = 1;
        $main_category->update();
        return redirect('/main-categories')->with('message','Category Publised Successfully !!!');
    }
    public function unpublishCategory($id){
        $main_category = MainCategories::where('id', $id)->first();
        $main_category->status = 2;
        $main_category->update();
        return redirect('/main-categories')->with('message','Category Unpublised Successfully !!!');
    }
    public function editeCategoryById(Request $request){
        $main_category = MainCategories::where('id', $request->id)->first();
        $data = array();
        $data['name'] = $main_category->category_name;
        $data['name_ban'] = $main_category->category_name_ban;
        $data['name_hin'] = $main_category->category_name_hin;
        $data['description'] = $main_category->category_description;
        $data['status'] = $main_category->status;
        $data['image'] = $main_category->image;
        return response()->json($data);
    }
    public function updateCategory(Request $request){
        $image = $request->file('image');
        $this->mainCategoryValidation($request);
        $main_category = MainCategories::where('id', $request->category_id)->first();
        if($image){
            unlink($main_category->image);
            $image_name =time().'_'.$image->getClientOriginalName();
            $category_image = 'category_image/';
            Image::make($image)->resize(1359,339)->save($category_image.$image_name);
            $main_category->image = $category_image.$image_name;
        }
        $main_category->category_name = $request->category_name;
        $main_category->category_name_ban = $request->category_name_ban;
        $main_category->category_name_hin = $request->category_name_hin;
        $main_category->category_description = $request->category_description;
        $main_category->status = $request->status;
        $main_category->update();
        return redirect('/main-categories')->with('message','Category Updated Successfully !!!');
    }
    public function deleteCategories($id){
        $main_category = MainCategories::where('id', $id)->first();
        if($main_category->image){
            unlink($main_category->image);
        }
        $main_category->delete();
        return redirect('/main-categories')->with('messageD','Category Deleted Successfully !!!');
    }

}
