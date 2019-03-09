<?php

namespace App\Http\Controllers;

use App\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function expense(){
        $expenses = Expense::orderBy('id', 'desk')->get();
        return view('backEnd.pages.expense.expense',[
            'expenses' => $expenses
        ]);
    }
    protected function expenseValidation($request){
        $request->validate([
            'expense_name' => 'required',
            'expense_amount' => 'required',
            'expense_description' => 'required',
            'status' => 'required'
        ]);
    }
    public function saveExpense(Request $request){
        $this->expenseValidation($request);
        $expense = new Expense();
        $expense->expense_name = $request->expense_name;
        $expense->expense_amount = $request->expense_amount;
        $expense->expense_description = $request->expense_description;
        $expense->status = $request->status;
        $expense->save();
        return redirect('/expense')->with('message', 'New Expense Saved Successfully');
    }
    public function unpublishedExpense($id){
        $expense = Expense::where('id', $id)->first();
        $expense->status = 2;
        $expense->update();
        return redirect('/expense')->with('message', 'Expense Unpublished Successfully');
    }
    public function publishedExpense($id){
        $expense = Expense::where('id', $id)->first();
        $expense->status = 1;
        $expense->update();
        return redirect('/expense')->with('message', 'Expense Published Successfully');
    }
    public function editeExpense(Request $request){
        $expense = Expense::where('id', $request->id)->first();
        return response()->json($expense);
    }
    public function updateExpense(Request $request){
        $this->expenseValidation($request);
        $expense = Expense::where('id', $request->expense_id)->first();
        $expense->expense_name = $request->expense_name;
        $expense->expense_amount = $request->expense_amount;
        $expense->expense_description = $request->expense_description;
        $expense->status = $request->status;
        $expense->update();
        return redirect('/expense')->with('message', 'Expense Updated Successfully');
    }
    public function deleteExpense($id){
        $expense = Expense::where('id', $id)->first();
        $expense->delete();
        return redirect('/expense')->with('message', 'Expense Deleted Successfully');
    }
}
