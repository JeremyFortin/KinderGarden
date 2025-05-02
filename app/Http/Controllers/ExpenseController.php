<?php

namespace App\Http\Controllers;

use App\Models\CategoryExpense;
use App\Models\Commerce;
use App\Models\Expense;
use DateTime;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index(Request $request)
    {
        $expenses = Expense::all();
        $commerces = Commerce::all();
        $expenseCategories = CategoryExpense::all();

        return view('expense', compact('expenses', 'commerces', 'expenseCategories'));
    }

    public function add(Request $request)
    {
        Expense::create([
            'dateTime' => new DateTime(),
            'amount' => $request->amount,
            'nursery_id' => $request->nursery_id,
            'commerce_id' => (int) $request->commerce_id,
            'category_expense_id' => $request->category_expense_id
        ]);
        return redirect()->route('List_Expense');
    }

    public function formModifyExpense($id)
    {
        $expense = Expense::findOrFail($id);
        $commerces = Commerce::all();
        $expenseCategories = CategoryExpense::all();
        return view('expenseModify', compact('expense', 'commerces', 'expenseCategories'));
    }

    public function update($id, Request $request)
    {
        $expense = Expense::findOrFail($id);

        $expense->dateTime = new DateTime();
        $expense->amount = $request->amount;
        $expense->commerce_id = $request->commerce_id;
        //$expense->category_expense_id = $request->category_depense_id;

        $expense->save();

        return redirect()->route('List_Expense');
    }

    public function delete($id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();
        return redirect()->route('List_Expense');
    }

    public function clear()
    {
        Expense::query()->delete();
        return redirect()->route('List_Expense');
    }
}
