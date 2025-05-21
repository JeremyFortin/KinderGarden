<?php

namespace App\Http\Controllers;

use App\Models\Commerce;
use Illuminate\Http\Request;

/**
 * Controller for managing Commerce entities.
 */
class CommerceController extends Controller
{
    /**
     * Display a listing of all commerces.
     */
    public function index()
    {
        $commerces = Commerce::all();
        return view('commerce', compact('commerces'));
    }

    /**
     * Store a new commerce in the database.
     */
    public function add(Request $request)
    {
        Commerce::create([
            'description' => $request->description,
            'address' => $request->address,
            'phone' => $request->phone
        ]);
        return redirect()->route('List_Commerce');
    }

    /**
     * Show the form to edit a specific commerce.
     */
    public function formModifyCommerce($id)
    {
        $commerce = Commerce::findOrFail($id);
        return view('commerceModify', compact('commerce'));
    }

    /**
     * Update an existing commerce.
     */
    public function update($id, Request $request)
    {
        $commerce = Commerce::findOrFail($id);

        $commerce->description = $request->description;
        $commerce->address = $request->address;
        $commerce->phone = $request->phone;

        $commerce->save();

        return redirect()->route('List_Commerce');
    }

    /**
     * Delete a specific commerce.
     */
    public function delete($id)
    {
        $commerce = Commerce::findOrFail($id);
        $commerce->delete();
        return redirect()->route('List_Commerce');
    }

    /**
     * Delete all commerces.
     */
    public function clear()
    {
        Commerce::query()->delete();
        return redirect()->route('List_Commerce');
    }
}
