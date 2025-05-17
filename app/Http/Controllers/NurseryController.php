<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Nursery;
use App\Models\Expense;
use Illuminate\Http\Request;

/**
 * Controller for managing Nursery entities.
 */
class NurseryController extends Controller
{
    /**
     * Display a listing of nurseries along with available states.
     */
    public function index()
    {
        $nurseries = Nursery::all();
        $states = State::all();
        return view('nursery', compact('nurseries', 'states'));
    }

    /**
     * Store a new nursery in the database.
     */
    public function add(Request $request)
    {
        Nursery::create([
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'state_id' => (int) $request->state_id,
            'phone' => $request->phone
        ]);
        return redirect()->route('List_Nursery');
    }

    /**
     * Show the form to edit a specific nursery and list related expenses.
     */
    public function formModifyNursery($id)
    {
        $nursery = Nursery::findOrFail($id);
        $states = State::all();
        $expenses = Expense::where('nursery_id', $id)->get();
        return view('nurseryModify', compact('nursery', 'states', 'expenses'));
    }

    /**
     * Update an existing nursery.
     */
    public function update($id, Request $request)
    {
        $nursery = Nursery::findOrFail($id);

        $nursery->name = $request->name;
        $nursery->address = $request->address;
        $nursery->city = $request->city;
        $nursery->state_id = $request->state_id;
        $nursery->phone = $request->phone;

        $nursery->save();

        return redirect()->route('List_Nursery');
    }

    /**
     * Delete a specific nursery.
     */
    public function delete($id)
    {
        $nursery = Nursery::findOrFail($id);
        $nursery->delete();
        return redirect()->route('List_Nursery');
    }

    /**
     * Delete all nurseries.
     */
    public function clear()
    {
        Nursery::query()->delete();
        return redirect()->route('List_Nursery');
    }
}
