<?php

namespace App\Http\Controllers;

use App\Models\Presence;
use App\Models\Nursery;
use App\Models\Expense;
use Illuminate\Http\Request;

/**
 * Controller for generating the financial report of a nursery.
 */
class RapportController extends Controller
{
    /**
     * Display the financial report including revenue, expenses, and profit for a selected nursery.
     */
    public function index(Request $request)
    {
        $depensesAdmissibles = 0;
        $nurseries = Nursery::all();
        $nurseryId = $request->input('nursery_id');

        if (is_null($nurseryId)) {
            $nurseryId = $nurseries[0]->id;
        }
        $expenses = Expense::where('nursery_id', $nurseryId)->get();
        foreach ($expenses as $expense) {
            $depensesAdmissibles += $expense->amount;
        }

        //since we are not creating teacher and kid by nursery i dont get what do to here,
        //so i count all attendences.
        $presences = Presence::all();
        $nbPresences = $presences->count();
        $revenus = $nbPresences * 48;

        $salaires = $nbPresences * 8 * 18;
        $depensesTotal = $depensesAdmissibles + $salaires;
        $profit = $revenus - $depensesTotal;

        return view('rapport', compact('nurseries', 'nbPresences', 'revenus', 'depensesAdmissibles', 'depensesTotal', 'salaires', 'profit'));
    }
}
