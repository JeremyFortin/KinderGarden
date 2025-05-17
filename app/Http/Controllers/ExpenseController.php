<?php

namespace App\Http\Controllers;

use App\Models\CategoryExpense;
use App\Models\Commerce;
use App\Models\Expense;
use App\Models\Nursery;
use DateTime;
use Illuminate\Http\Request;

/**
 * Controller for managing Expense entities.
 */
class ExpenseController extends Controller
{
    /**
     * Display a listing of expenses filtered by nursery.
     */
    public function index(Request $request)
    {
        $nurseryId = $request->nursery_id;
        $nurseries = Nursery::All();
        $expenses = Expense::where('nursery_id', $nurseryId)->get();
        $commerces = Commerce::all();
        $expenseCategories = CategoryExpense::all();

        return view('expense', compact('expenses', 'commerces', 'expenseCategories', 'nurseries'));
    }

    /**
     * Store a new expense in the database.
     */
    public function add(Request $request)
    {
        Expense::create([
            'dateTime' => new DateTime(),
            'amount' => $request->amount,
            'nursery_id' => (int) $request->nursery_id,
            'commerce_id' => (int) $request->commerce_id,
            'category_expense_id' => (int) $request->expenseCategory_id
        ]);

        return redirect()->route('List_Expense', ['nursery_id' => $request->nursery_id])
            ->with('success', 'Dépense ajoutée avec succès.');
    }

    /**
     * Show the form to edit a specific expense.
     */
    public function formModifyExpense($id)
    {
        $expense = Expense::findOrFail($id);
        $commerces = Commerce::all();
        $expenseCategories = CategoryExpense::all();
        return view('expenseModify', compact('expense', 'commerces', 'expenseCategories'));
    }

    /**
     * Update an existing expense.
     */
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

    /**
     * Delete a specific expense.
     */
    public function delete($id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();
        return redirect()->route('List_Expense');
    }

    /**
     * Delete all expenses.
     */
    public function clear()
    {
        Expense::query()->delete();
        return redirect()->route('List_Expense');
    }
}
