<?php

namespace App\Http\Controllers;

use App\Dynamicpage;
use App\MainCategories;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use Image;

class DynamicpageController extends Controller
{
    public function dynamicPage(){
        $dynamicpage = Dynamicpage::orderBy('id', 'Desc')->get();
        return view('backEnd.pages.dynamicPage.dynamic_page',['dynamicpages' => $dynamicpage]);
    }
    public function pageValidation($request){
        $request->validate([
            'page_name_eng' => 'required',
            'page_name_ban' => 'required',
            'page_name_hin' => 'required',
            'status' => 'required',
        ]);
    }
    public function saveNewPage(Request $request){
        $image = $request->file('image');
        $image_name = time().'_'.$image->getClientOriginalName();
        $image_url = 'page-image/';
        Image::make($image)->resize(1359,339)->save($image_url.$image_name);
        $this->pageValidation($request);
        $dynamicpage = new Dynamicpage();
        $dynamicpage->page_name_eng = $request->page_name_eng;
        $dynamicpage->page_name_ban = $request->page_name_ban;
        $dynamicpage->page_name_hin = $request->page_name_hin;
        $dynamicpage->image = $image_url.$image_name;
        $dynamicpage->status = $request->status;
        $dynamicpage->save();
        return redirect('/dynamic-page')->with('message', 'New Page Created Successfully !!!');
    }
    public function unpublishPage($id){
        $dynamicpage = Dynamicpage::where('id', $id)->first();
        $dynamicpage->status = 2;
        $dynamicpage->update();
        return redirect('/dynamic-page')->with('message', 'Page Unpublished Successfully !!!');
    }
    public function publishPage($id){
        $dynamicpage = Dynamicpage::where('id', $id)->first();
        $dynamicpage->status = 1;
        $dynamicpage->update();
        return redirect('/dynamic-page')->with('message', 'Page Unpublished Successfully !!!');
    }
    public function updatePage(Request $request){
        $this->pageValidation($request);
        $dynamicpage = Dynamicpage::where('id', $request->id)->first();
        $image = $request->file('image');
        if ($image){
            unlink($dynamicpage->image);
            $image_name = time().'_'.$image->getClientOriginalName();
            $image_url = 'page-image/';
            Image::make($image)->resize(1359,339)->save($image_url.$image_name);
            $dynamicpage->image = $image_url.$image_name;
        }
        $dynamicpage->page_name_eng = $request->page_name_eng;
        $dynamicpage->page_name_ban = $request->page_name_ban;
        $dynamicpage->page_name_hin = $request->page_name_hin;
        $dynamicpage->status = $request->status;
        $dynamicpage->update();
        return redirect('/dynamic-page')->with('message', 'Page Updated Successfully !!!');
    }
    public function deletePage($id){
        $dynamicpage = Dynamicpage::where('id', $id)->first();
        unlink($dynamicpage->image);
        $dynamicpage->delete();
        return redirect('/dynamic-page')->with('messageD', 'Dynamic Page Deleted Successfully !!!');
    }

    //FrontEnd
    public function offerPage($id, $name){
        $dynamicpage = Dynamicpage::where('id', $id)->first();
        $products = Product::where('offer_id', $id)->get();
        $product_id = array();
        foreach ($products as $key => $product){
            $product_id[$key] = $product->id;
        }
        $images = ProductImage::whereIn('product_id', $product_id)->get();

        return view('customTemplate.offerPage.offerPage', [
            'dynamicpage' => $dynamicpage,
            'products' =>$products,
            'images' =>$images
            ]);
    }

}
