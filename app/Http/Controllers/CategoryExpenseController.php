<?php

namespace App\Http\Controllers;

use App\Models\CategoryExpense;
use Illuminate\Http\Request;

class CategoryExpenseController extends Controller
{
    public function index()
    {
        $categoriesExpenses = CategoryExpense::all();
        return view('categoryExpense', compact('categoriesExpenses'));
    }

    public function add(Request $request)
    {
        CategoryExpense::create([
            'description' => $request->description,
            'pourcentage' => $request->pourcentage,
        ]);
        return redirect()->route('List_CategoryExpense');
    }

    public function formModifyCategoryExpense($id)
    {
        $categoryExpense = CategoryExpense::findOrFail($id);
        return view('categoryExpenseModify', compact('categoryExpense'));
    }

    public function update($id, Request $request)
    {
        $categoryExpense = CategoryExpense::findOrFail($id);

        $categoryExpense->description = $request->description;
        $categoryExpense->pourcentage = $request->pourcentage;
        $categoryExpense->save();

        return redirect()->route('List_CategoryExpense');
    }

    public function delete($id)
    {
        $categoryExpense = CategoryExpense::findOrFail($id);
        $categoryExpense->delete();
        return redirect()->route('List_CategoryExpense');
    }

    public function clear()
    {
        CategoryExpense::query()->delete();
        return redirect()->route('List_CategoryExpense');
    }
}
