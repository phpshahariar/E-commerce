<?php

namespace App\Http\Controllers;

use App\Country;
use App\District;
use App\Division;
use App\SubDistrict;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function showDivision(){
        $divisions = Division::orderBy('id', 'DESC')->get();
        $countries = Country::orderBy('id', 'DESC')->get();
        return view('backEnd.pages.division.division',[
            'divisions' => $divisions,
            'countries' => $countries,
        ]);
    }
    protected function divisionValidation($request){
        $request->validate([
            'division_name' => 'required',
            'shipping_charge' => 'required',
            'country_id' => 'required',
            'status' => 'required'
        ]);
    }
    public function saveDivision(Request $request){
        $this->divisionValidation($request);
        $division = new Division();
        $division->division_name = $request->division_name;
        $division->shipping_charge = $request->shipping_charge;
        $division->country_id = $request->country_id;
        $division->status = $request->status;
        $division->save();
        return redirect('/division')->with('message','Division Info Saved Successfully !!!');
    }
    public function unpublishDivision($id){
        $division = Division::where('id', $id)->first();
        $division->status = 2;
        $division->update();
        return redirect('/division')->with('message','Division Unpublished Successfully !!!');
    }
    public function publishDivision($id){
        $division = Division::where('id', $id)->first();
        $division->status = 1;
        $division->update();
        return redirect('/division')->with('message','Division Published Successfully !!!');
    }
    public function editeDivision(Request $request){
        $division = Division::where('id', $request->id)->first();
        $data = array();
        $data['division_name'] = $division->division_name;
        $data['country_id'] = $division->country_id;
        $data['status'] = $division->status;
        $data['shipping_charge'] = $division->shipping_charge;
        return response()->json($data);
    }
    public function updateDivision(Request $request){
        $this->divisionValidation($request);
        $division = Division::where('id', $request->division_id)->first();
        $division->division_name = $request->division_name;
        $division->shipping_charge = $request->shipping_charge;
        $division->country_id = $request->country_id;
        $division->status = $request->status;
        $division->update();
        return redirect('/division')->with('message','Division Updated Successfully !!!');
    }
    public function deleteDivision($id){
        $division = Division::where('id', $id)->first();
        $division->delete();
        return redirect('/division')->with('messageD','Division Deleted Successfully !!!');
    }

    //district

    public function showDistrict(){
        $divisions = Division::all();
        $districts = District::orderBy('id', 'DESC')->get();
        $countries = Country::all();
        return view('backEnd.pages.district.district',[
            'divisions' => $divisions,
            'districts' => $districts,
            'countries' => $countries,

        ]);
    }
    protected function districtValidation($request){
        $request->validate([
            'district_name' => 'required',
            'country_id' => 'required',
            'division_id' => 'required',
            'status' => 'required',
        ]);
    }
    public function saveDistrict(Request $request){
        $this->districtValidation($request);
        $district = new District();
        $district->district_name = $request->district_name;
        $district->country_id = $request->country_id;
        $district->division_id = $request->division_id;
        $district->status = $request->status;
        $district->save();
        return redirect('/district')->with('message', 'District Saved Successfully');

    }
    public function unpublishDistrict($id){
        $district = District::where('id', $id)->first();
        $district->status = 2;
        $district->update();
        return redirect('/district')->with('message', 'District Unpublished Successfully');
    }
    public function publishDistrict($id){
        $district = District::where('id', $id)->first();
        $district->status = 1;
        $district->update();
        return redirect('/district')->with('message', 'District Published Successfully');
    }
    public function editeDistrict(Request $request){
        $district = District::where('id', $request->id)->first();
        $data = array();
        $data['district_name'] = $district->district_name;
        $data['country_id'] = $district->country_id;
        $data['division_id'] = $district->division_id;
        $data['status'] = $district->status;
        return response()->json($data);
    }
    public function updateDistrict(Request $request){
        $this->districtValidation($request);
        $district = District::where('id', $request->district_id)->first();
        $district->district_name = $request->district_name;
        $district->division_id = $request->division_id;
        $district->status = $request->status;
        $district->update();
        return redirect('/district')->with('message', 'District Updated Successfully');
    }
    public function deleteDistrict($id){
        $district = District::where('id', $id)->first();
        $district->delete();
        return redirect('/district')->with('messageD', 'District Deleted Successfully');
    }
    public function showSubDistrict(){
        $divisions = Division::all();
        $sub_districts = SubDistrict::all();
        $districts = District::all();
        $countries = Country::all();

        return view('backEnd.pages.sub_district.sub_district',[
            'divisions' => $divisions,
            'sub_districts' => $sub_districts,
            'districts' => $districts,
            'countries' => $countries,

        ]);
    }
    public function manageDistrict(Request $request){
        $districts = District::where('division_id',$request->id)->get();
        return response()->json($districts);

    }
    public function manageDivision(Request $request){
        $divisions = Division::where('country_id',$request->id)->get();
        return response()->json($divisions);

    }
    protected function subDistrictValidation($request){
        $request->validate([
            'sub_district_name' => 'required',
            'country_id' => 'required',
            'division_id' => 'required',
            'district_id' => 'required',
            'status' => 'required',
        ]);
    }
    public function saveSubDistrict(Request $request){
        $this->subDistrictValidation($request);
       $sub_district = new SubDistrict();
       $sub_district->sub_district_name = $request->sub_district_name;
       $sub_district->country_id = $request->country_id;
       $sub_district->division_id = $request->division_id;
       $sub_district->district_id = $request->district_id;
       $sub_district->status = $request->status;
       $sub_district->save();
       return redirect('/sub-district')->with('message', 'Sub District Saved Successfully');
    }
    public function unpublishSubDistrict($id){
       $sub_district = SubDistrict::where('id', $id)->first();
       $sub_district->status = 2;
       $sub_district->update();
       return redirect('/sub-district')->with('message', 'Sub District Unpublished Successfully');
    }
    public function publishSubDistrict($id){
       $sub_district = SubDistrict::where('id', $id)->first();
       $sub_district->status = 1;
       $sub_district->update();
       return redirect('/sub-district')->with('message', 'Sub District Published Successfully');
    }
    public function editeSubDistrict(Request $request){
        $sub_district = SubDistrict::where('id', $request->id)->first();
        $data = array();
        $data['name'] = $sub_district->sub_district_name;
        $data['country_id'] = $sub_district->country_id;
        $data['division'] = $sub_district->division_id;
        $data['district'] = $sub_district->district_id;
        $data['status'] = $sub_district->status;
        return response()->json($data);
    }
    public function updateSubDistrict(Request $request){
        $this->subDistrictValidation($request);
        $sub_districts = SubDistrict::where('id', $request->sub_district_id)->first();
        $sub_districts->sub_district_name = $request->sub_district_name;
        $sub_districts->country_id = $request->country_id;
        $sub_districts->division_id = $request->division_id;
        $sub_districts->district_id = $request->district_id;
        $sub_districts->status = $request->status;
        $sub_districts->update();
        return redirect('/sub-district')->with('message', 'Sub District Update Successfully');
    }
    public function deleteSubDistrict($id){
        $sub_district = SubDistrict::where('id', $id)->first();
        $sub_district->delete();
        return redirect('/sub-district')->with('messageD', 'Sub District Deleted Successfully');
    }
    public function showCountry(){
        $countries = Country::orderBy('id', 'DESC')->get();
        return view('backEnd.pages.country.country',['countries' => $countries]);
    }
    protected function countryValidation($request){
        $request->validate([
            'country_name' => 'required',
            'country_description' => 'required',
            'shipping_charge' => 'required',
            'status' => 'required',
        ]);
    }
    public function saveCountry(Request $request){
        $this->countryValidation($request);
        $country = new Country();
        $country->country_name = $request->country_name;
        $country->shipping_charge = $request->shipping_charge;
        $country->country_description = $request->country_description;
        $country->status = $request->status;
        $country->save();
        return redirect('/country')->with('message', 'Country Info Saved Successfully');
    }
    public function unpublishCountry($id){
        $country = Country::where('id', $id)->first();
        $country->status = 2;
        $country->update();
        return redirect('/country')->with('message', 'Country Unpublished Successfully');
    }
    public function publishCountry($id){
        $country = Country::where('id', $id)->first();
        $country->status = 1;
        $country->update();
        return redirect('/country')->with('message', 'Country Published Successfully');
    }
    public function editeCountry(Request $request){
        $country = Country::where('id', $request->id)->first();
        return response()->json($country);
    }
    public function updateCountry(Request $request){
        $this->countryValidation($request);
        $country = Country::where('id', $request->country_id)->first();
        $country->country_name = $request->country_name;
        $country->shipping_charge = $request->shipping_charge;
        $country->country_description = $request->country_description;
        $country->status = $request->status;
        $country->update();
        return redirect('/country')->with('message', 'Country Updated Successfully');
    }
    public function deleteCountry($id){
        $country = Country::where('id', $id)->first();
        $country->delete();
        return redirect('/country')->with('messageD', 'Country Deleted Successfully');

    }

}
