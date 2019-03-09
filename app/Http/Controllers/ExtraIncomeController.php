<?php

namespace App\Http\Controllers;

use App\ExtraIncome;
use Illuminate\Http\Request;

class ExtraIncomeController extends Controller
{
    public function extraIncome(){
        $extraIncomes = ExtraIncome::orderBy('id', 'desk')->get();
        return view('backEnd.pages.extraIncome.extraIncome',[
            'extraIncomes' => $extraIncomes
        ]);
    }
    protected function extraIncomeValidation($request){
        $request->validate([
            'income_name' => 'required',
            'income_amount' => 'required',
            'income_description' => 'required',
            'status' => 'required'
        ]);
    }
    public function saveExtraIncome(Request $request){
        $this->extraIncomeValidation($request);
        $extraIncome = new ExtraIncome();
        $extraIncome->income_name = $request->income_name;
        $extraIncome->income_amount = $request->income_amount;
        $extraIncome->income_description = $request->income_description;
        $extraIncome->status = $request->status;
        $extraIncome->save();
        return redirect('/extra-income')->with('message', 'ExtraInome Save Successfully');
    }
    public function unpublishedExtraIncome($id){
        $extraIncome = ExtraIncome::where('id', $id)->first();
        $extraIncome->status = 2;
        $extraIncome->update();
        return redirect('/extra-income')->with('message', 'ExtraIncome Unpublished Successfully');
    }
    public function publishedExtraIncome($id){
        $extraIncome = ExtraIncome::where('id', $id)->first();
        $extraIncome->status = 1;
        $extraIncome->update();
        return redirect('/extra-income')->with('message', 'ExtraIncome Published Successfully');
    }
    public function editeExtraIncome(Request $request){
        $extraIncome = ExtraIncome::where('id', $request->id)->first();
        return response()->json($extraIncome);
    }
    public function updateExtraIncome(Request $request){
        $this->extraIncomeValidation($request);
        $extraIncome = ExtraIncome::where('id', $request->income_id)->first();
        $extraIncome->income_name = $request->income_name;
        $extraIncome->income_amount = $request->income_amount;
        $extraIncome->income_description = $request->income_description;
        $extraIncome->status = $request->status;
        $extraIncome->update();
        return redirect('/extra-income')->with('message', 'ExtraIncome Updated Successfully');
    }
    public function deleteExtraIncome($id){
        $extraIncome = ExtraIncome::where('id', $id)->first();
        $extraIncome->delete();
        return redirect('/extra-income')->with('message', 'ExtraIncome Deleted Successfully');
    }
}
