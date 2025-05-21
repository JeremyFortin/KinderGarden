<?php

namespace App\Http\Controllers;

use App\Models\CategoryExpense;
use Illuminate\Http\Request;

/**
 * Controller for managing CategoryExpense entities.
 */
class CategoryExpenseController extends Controller
{
    /**
     * Display all category expenses.
     */
    public function index()
    {
        $categoriesExpenses = CategoryExpense::all();
        return view('categoryExpense', compact('categoriesExpenses'));
    }

    /**
     * Store a new category expense in the database.
     */
    public function add(Request $request)
    {
        CategoryExpense::create([
            'description' => $request->description,
            'pourcentage' => $request->pourcentage,
        ]);
        return redirect()->route('List_CategoryExpense');
    }

    /**
     * Show the form to edit a specific category expense.
     */
    public function formModifyCategoryExpense($id)
    {
        $categoryExpense = CategoryExpense::findOrFail($id);
        return view('categoryExpenseModify', compact('categoryExpense'));
    }

    /**
     * Update an existing category expense.
     */
    public function update($id, Request $request)
    {
        $categoryExpense = CategoryExpense::findOrFail($id);

        $categoryExpense->description = $request->description;
        $categoryExpense->pourcentage = $request->pourcentage;
        $categoryExpense->save();

        return redirect()->route('List_CategoryExpense');
    }

    /**
     * Delete a specific category expense.
     */
    public function delete($id)
    {
        $categoryExpense = CategoryExpense::findOrFail($id);
        $categoryExpense->delete();
        return redirect()->route('List_CategoryExpense');
    }

    /**
     * Delete all category expenses.
     */
    public function clear()
    {
        CategoryExpense::query()->delete();
        return redirect()->route('List_CategoryExpense');
    }
}
