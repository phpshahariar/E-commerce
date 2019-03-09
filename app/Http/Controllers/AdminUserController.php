<?php

namespace App\Http\Controllers;

use App\Country;
use App\District;
use App\Division;
use App\SubDistrict;
use App\UserAdmin;
use Illuminate\Http\Request;
use DB;
use Image;

class AdminUserController extends Controller
{
    public function register(){
        $user_admins = DB::table('user_admins')
            ->join('divisions', 'user_admins.division_id', '=', 'divisions.id')
            ->join('districts', 'user_admins.district_id', '=', 'districts.id')
            ->join('sub_districts', 'user_admins.sub_district_id', '=', 'sub_districts.id')
            ->select('user_admins.*', 'divisions.division_name','districts.district_name','sub_districts.sub_district_name')
            ->orderBy('id', 'DESC')

            ->get();
        $divistions = Division::where('status', 1)->get();
        $districts = District::where('status', 1)->get();
        $sub_districts = SubDistrict::where('status', 1)->get();
        $countries = Country::all();
        return view('backEnd.pages.register_user.register_user',[
            'divisions' => $divistions,
            'districts' => $districts,
            'sub_districts' => $sub_districts,
            'user_admins' => $user_admins,
            'countries' => $countries,
        ]);
    }
    public function manageSubDistrict(Request $request){
        $sub_district = SubDistrict::where('district_id', $request->id)->get();
        return response()->json($sub_district);
    }
    protected function userValidation($request){
        $request->validate([
            'user_name' => 'required',
            'email' => 'required | email',
            'phone' => 'required | numeric',
            'password' => 'required',
            'admin_role' => 'required',
            'address' => 'required',
            'country_id' => 'required',
            'division_id' => 'required',
            'district_id' => 'required',
            'sub_district_id' => 'required',
            'status' => 'required',
        ]);
    }
    protected function userValidationwithoutpass($request){
        $request->validate([
            'user_name' => 'required',
            'email' => 'required | email',
            'phone' => 'required | numeric',

            'admin_role' => 'required',
            'address' => 'required',
            'division_id' => 'required',
            'district_id' => 'required',
            'sub_district_id' => 'required',
            'status' => 'required',
        ]);
    }
    public function saveUser(Request $request){
        $shopper_banner = $request->file('shopper_banner');
        $image_name = time().'_'.$shopper_banner->getClientOriginalName();
        $image_url = 'shopper_banner/';
        Image::make($shopper_banner)->resize(1359,339)->save($image_url.$image_name);
        $this->userValidation($request);
       $user_admin = new UserAdmin();
       $user_admin->user_name = $request->user_name;
       $user_admin->email = $request->email;
       $user_admin->phone = $request->phone;
       $user_admin->password =  bcrypt($request->password);
       $user_admin->admin_role = $request->admin_role;
       $user_admin->address = $request->address;
       $user_admin->country_id = $request->country_id;
       $user_admin->division_id = $request->division_id;
       $user_admin->district_id = $request->district_id;
       $user_admin->sub_district_id = $request->sub_district_id;
       $user_admin->shopper_banner = $image_url.$image_name;
       $user_admin->status = $request->status;
       $user_admin->save();
       return redirect('/register')->with('message', 'User Successfully Register');
    }
    public function unpublishUser($id){
        $user_admin = UserAdmin::where('id',$id)->first();
        $user_admin->status = 2;
        $user_admin->update();
        return redirect('/register')->with('message', 'User Unpublished Successfully');
    }
    public function publishUser($id){
        $user_admin = UserAdmin::where('id',$id)->first();
        $user_admin->status = 1;
        $user_admin->update();
        return redirect('/register')->with('message', 'User Published Successfully');
    }
    public function editeUser(Request $request){
        $user_admin = UserAdmin::where('id',$request->id)->first();
        $data = $user_admin->toArray();
        return response()->json($data);
    }
    public function updateUser(Request $request){
        $this->userValidationwithoutpass($request);
        $user_admin = UserAdmin::where('id', $request->user_id)->first();
        $up_shopper_banner = $request->file('shopper_banner');
        if($up_shopper_banner){
            unlink($user_admin->shopper_banner);
            $image_name = time().'_'.$up_shopper_banner->getClientOriginalName();
            $image_url = 'shopper_banner/';
            Imake::make($up_shopper_banner)->resize(1359,339)->save($image_url.$image_name);
            $user_admin->shopper_banner = $image_url.$image_name;
        }
        $user_admin->user_name = $request->user_name;
        $user_admin->email = $request->email;
        $user_admin->phone = $request->phone;
        if($request->password != null){
            $user_admin->password =  bcrypt($request->password);
        }
        $user_admin->admin_role = $request->admin_role;
        $user_admin->address = $request->address;
        $user_admin->division_id = $request->division_id;
        $user_admin->district_id = $request->district_id;
        $user_admin->sub_district_id = $request->sub_district_id;
        $user_admin->status = $request->status;
        $user_admin->commission_rate = $request->commission_rate;
        $user_admin->shopper_point = $request->shopper_point;
        $user_admin->shipping_info = $request->shipping_info;
        $user_admin->update();
        return redirect('/register')->with('message', 'User Updated Successfully !!!');
    }
    public function deleteUser($id){
        $user_admin = UserAdmin::where('id', $id)->first();
        if($user_admin){
            unlink($user_admin->shopper_banner);
        }
        $user_admin->delete();
        return redirect('/register')->with('messageD', 'User Deleted Successfully !!!');
    }


}
