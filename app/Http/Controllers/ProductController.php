<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Dynamicpage;
use App\MainCategories;
use App\PriceWithRange;
use App\Product;
use App\Product_size;
use App\ProductImage;
use App\SubCategories;
use App\UserAdmin;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

class ProductController extends Controller
{
    public function showProduct()
    {
        $categories = MainCategories::where('status', 1)->get();
        $brands = Brand::where('brand_status', 1)->get();
//        return Session::get('admin_role');
        if(Session::get('admin_role') == 1){
            $products = Product::where('admin_id', Session::get('admin_id'))->orderBy('id', 'desk')->get();
        }else{
            $products = Product::orderBy('id', 'DESC')->get();
        }
        $product_image = ProductImage::all();
        $product_size = Product_size::all();
        $offers = Dynamicpage::orderBy('id', 'DESC')->get();
//        return $product_image;
        return view('backEnd.pages.product.product', [
            'categories' => $categories,
            'brands' => $brands,
            'products' => $products,
            'product_images' => $product_image,
            'product_size' => $product_size,
            'offers' => $offers,
        ]);
    }
    public function manageSubCategorie(Request $request){
        $sub_cat = SubCategories::where('main_category_id', $request->id)->get();
        return response()->json($sub_cat);
    }
    protected function productValidation($request){
        $request->validate([
            'main_category_id' => 'required',
            'sub_category_id' => 'required',
            'product_brand' => 'required',
            'product_qty' => 'required',
            'product_name_eng' => 'required',
            'product_price_eng' => 'required',
            'product_short_description_eng' => 'required',
            'prodcut_long_description_eng' => 'required',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
    }
    protected function productBasicInfo($request, $admin_info){
        $product = new Product();
        $product->main_category_id = $request->main_category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->product_brand = $request->product_brand;
        $product->offer_id = $request->offer_id;
        $product->top_sellers = $request->top_sellers;
        $product->special = $request->special;
        $product->hot_product = $request->hot_product;
        $product->top_rated = $request->top_rated;
        $product->product_qty = $request->product_qty;
        $product->ex_date = $request->ex_date;
        $product->product_name_eng = $request->product_name_eng;
        $product->product_name_ban = $request->product_name_ban;
        $product->product_name_hin = $request->product_name_hin;
        $product->product_price_eng = $request->product_price_eng;
        $product->product_price_ban = $request->product_price_ban;
        $product->product_price_hin = $request->product_price_hin;

        $product->note_eng = $request->note_eng;
        $product->note_ban = $request->note_ban;
        $product->note_hin = $request->note_hin;

        $product->product_short_description_eng = $request->product_short_description_eng;
        $product->prodcut_short_description_ban = $request->prodcut_short_description_ban;
        $product->product_short_description_hin = $request->product_short_description_hin;
        $product->prodcut_long_description_eng = $request->prodcut_long_description_eng;
        $product->prodcut_long_description_ban = $request->prodcut_long_description_ban;
        $product->product_long_description_hin = $request->product_long_description_hin;


        $product->product_color_eng = $request->product_color_eng;
        $product->product_color_ban = $request->product_color_ban;
        $product->product_color_hin = $request->product_color_hin;
//        $product->shipping_outside_country_eng = $request->shipping_outside_country_eng;
//        $product->shipping_outside_country_ban = $request->shipping_outside_country_ban;
//        $product->shipping_outside_country_hin = $request->shipping_outside_country_hin;
//        $product->shipping_inside_country_eng = $request->shipping_inside_country_eng;
//        $product->shipping_inside_country_ban = $request->shipping_inside_country_ban;
//        $product->shipping_inside_country_hin = $request->shipping_inside_country_hin;
//        $product->shipping_inside_region_eng = $request->shipping_inside_region_eng;
//        $product->shipping_inside_region_ban = $request->shipping_inside_region_ban;
//        $product->shipping_inside_region_hin = $request->shipping_inside_region_hin;

        $product->admin_id = $admin_info->id;
        $product->country_id = $admin_info->country_id;
        $product->division_id = $admin_info->division_id;
        $product->district_id = $admin_info->district_id;
        $product->sub_district_id = $admin_info->sub_district_id;
        $product->status = $request->status;
        $product->save();
        $product_id = $product->id;
        return $product_id;
    }

    protected function saveProductImages($image_arry, $product_id){
        $image_arry_len = count($image_arry);
        for($i=0; $i<$image_arry_len; $i++){
            $product_image = new ProductImage();
            $imageName    = time().'_'.$image_arry[$i]->getClientOriginalName();
            $image = $image_arry[$i];
            $image_large = 'product_image/large/';
            $image_medium = 'product_image/medium/';
            $image_small = 'product_image/small/';

            Image::make($image)->resize(441,463)->save($image_large.$imageName);
            Image::make($image)->resize(132,132)->save($image_medium.$imageName);
            Image::make($image)->resize(115,115)->save($image_small.$imageName);
            $product_image->product_id = $product_id;
            $product_image->large_image = $image_large.$imageName;
            $product_image->medium_image = $image_medium.$imageName;
            $product_image->small_image = $image_small.$imageName;
            $product_image->save();

        }
    }
    protected function saveProductSize($product_size_arry, $product_id){

        $product_size_arry_len = count($product_size_arry);
        for($i=0; $i < $product_size_arry_len; $i++){
            $product_size = new Product_size();
            $product_size->product_id = $product_id;
            $product_size->product_size_name = $product_size_arry[$i];
            $product_size->save();
        }

    }
    protected function productPriceRangeValidation($request){
        $request->validate([
            'price_first_number' => 'required',
            'price_last_number' => 'required',
            'first_to_last_number_price' => 'required',
        ]);
    }
    protected function saveProductPriceRange($product_id, $price_first_number_arry, $price_last_number_arry, $first_to_last_number_price_arry){
     $price_arry_len = count($price_first_number_arry);
     for ($i=0; $i < $price_arry_len; $i++){
         $price_range = new PriceWithRange();
         $price_range->product_id = $product_id;
         $price_range->price_first_number = $price_first_number_arry[$i];
         $price_range->price_last_number = $price_last_number_arry[$i];
         $price_range->first_to_last_number_price = $first_to_last_number_price_arry[$i];
         $price_range->save();
     }
    }
    public function saveProduct(Request $request){
//       return $request->all();
//       exit();
        $admin_id   = Session::get('admin_id');
        $admin_info = UserAdmin::where('id', $admin_id)->first();
        $image_arry = $request->file('product_image');
        $product_size_arry = $request->product_size;
        $price_first_number_arry = $request->price_first_number;
        $price_last_number_arry = $request->price_last_number;
        $first_to_last_number_price_arry = $request->first_to_last_number_price;
        $this->productValidation($request);
        $product_id = $this->productBasicInfo($request, $admin_info);
        $this->saveProductImages($image_arry, $product_id);
        if($price_first_number_arry != ''){
            $this->productPriceRangeValidation($request);
            $this->saveProductPriceRange($product_id, $price_first_number_arry, $price_last_number_arry, $first_to_last_number_price_arry);
        }
        if ($product_size_arry != ''){
            $this->saveProductSize($product_size_arry, $product_id);
        }
        return redirect('/product')->with('message', 'Product Info Save Successfully !!!');

    }
    public function unpublishedProduct($id){
        $product = Product::where('id',$id)->first();
        $product->status = 2;
        $product->update();
        return redirect('/product')->with('message', 'Product Info Unpublished Successfully !!!');
    }
    public function publishedProduct($id){
        $product = Product::where('id',$id)->first();
        $product->status = 1;
        $product->update();
        return redirect('/product')->with('message', 'Product Info Published Successfully !!!');
    }
    public function viewProduct($id){
        $product = Product::where('id',$id)->first();
        $images = ProductImage::where('product_id', $id)->get();
        $size = Product_size::where('product_id', $id)->get();
        $main_categories = MainCategories::all();
        $sub_categories  = SubCategories::all();
        $brand           = Brand::all();
        $adminfo        = DB::table('user_admins')

                          ->join('countries', 'countries.id', '=', 'user_admins.country_id')
                          ->join('divisions', 'user_admins.division_id', '=', 'divisions.id')
                          ->join('districts', 'user_admins.district_id', '=', 'districts.id')
                          ->join('sub_districts', 'user_admins.sub_district_id', '=', 'sub_districts.id')
                          ->select('user_admins.*', 'countries.country_name', 'divisions.division_name', 'districts.district_name', 'sub_districts.sub_district_name')
                          ->where('user_admins.id', $product->admin_id)
                          ->first();




        return view('backEnd.pages.product.view_product',[
            'product' => $product,
            'images' => $images,
            'size' => $size,
            'main_categories' => $main_categories,
            'sub_categories' => $sub_categories,
            'brands' => $brand,
            'adminInfo' => $adminfo,
        ]);
    }
    public function deleteImage(Request $request){
       $image = ProductImage::where('id', $request->id)->first();

       if ($image){
           unlink($image->large_image);
           unlink($image->medium_image);
           unlink($image->small_image);
       }
       $image->delete();
       echo 'Success';
    }
    public function updateImage(Request $request){
        $image_arry = $request->file('product_image');
        $product_id = $request->productId;
        $this->saveProductImages($image_arry, $product_id);
        return redirect()->back()->with('message', 'Image Upload Successfully !!!');

    }
    public function updateViewProduct(Request $request){
        $up_product = Product::where('id', $request->id)->first();
        return response()->json($up_product);
    }

    public function updateProduct(Request $request){
        $product = Product::where('id', $request->product_id)->first();
        $product->main_category_id = $request->main_category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->product_brand = $request->product_brand;
        $product->offer_id = $request->offer_id;
        $product->top_sellers = $request->top_sellers;
        $product->special = $request->special;
        $product->hot_product = $request->hot_product;
        $product->top_rated = $request->top_rated;
        $product->product_qty = $request->product_qty;
        $product->ex_date = $request->ex_date;
        $product->product_name_eng = $request->product_name_eng;
        $product->product_name_ban = $request->product_name_ban;
        $product->product_name_hin = $request->product_name_hin;
        $product->product_price_eng = $request->product_price_eng;
        $product->product_price_ban = $request->product_price_ban;
        $product->product_price_hin = $request->product_price_hin;

        $product->note_eng = $request->note_eng;
        $product->note_ban = $request->note_ban;
        $product->note_hin = $request->note_hin;

        $product->product_short_description_eng = $request->product_short_description_eng;
        $product->prodcut_short_description_ban = $request->prodcut_short_description_ban;
        $product->product_short_description_hin = $request->product_short_description_hin;
        $product->prodcut_long_description_eng = $request->prodcut_long_description_eng;
        $product->prodcut_long_description_ban = $request->prodcut_long_description_ban;
        $product->product_long_description_hin = $request->product_long_description_hin;
        $product->product_color_eng = $request->product_color_eng;
        $product->product_color_ban = $request->product_color_ban;
        $product->product_color_hin = $request->product_color_hin;

//        $product->shipping_outside_country_eng = $request->shipping_outside_country_eng;
//        $product->shipping_outside_country_ban = $request->shipping_outside_country_ban;
//        $product->shipping_outside_country_hin = $request->shipping_outside_country_hin;
//        $product->shipping_inside_country_eng = $request->shipping_inside_country_eng;
//        $product->shipping_inside_country_ban = $request->shipping_inside_country_ban;
//        $product->shipping_inside_country_hin = $request->shipping_inside_country_hin;
//        $product->shipping_inside_region_eng = $request->shipping_inside_region_eng;
//        $product->shipping_inside_region_ban = $request->shipping_inside_region_ban;
//        $product->shipping_inside_region_hin = $request->shipping_inside_region_hin;
        $product->status = $request->status;
        $product->save();
        return redirect('/product')->with('message', 'Prouct Has Been Successfully Update');

    }
    public function deleteProduct($id){
        $product = Product::where('id', $id)->first();
        $images = ProductImage::where('product_id', $id)->get();
        $image_arry_len = count($images);
        for($i=0; $i<$image_arry_len; $i++){
            if ($images){
                unlink($images[$i]->large_image);
                unlink($images[$i]->medium_image);
                unlink($images[$i]->small_image);
            }
            $images[$i]->delete();
        }
        $product_size = Product_size::where('product_id', $id)->get();
        $product_size_arry = count($product_size);
        for($i=0; $i<$product_size_arry; $i++) {
            if ($product_size) {
                $product_size[$i]->delete();
            }
        }
        $product->delete();
        return redirect('/product')->with('message', 'Product Deleted Successfully');
    }

}
