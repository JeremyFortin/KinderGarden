<?php

namespace App\Http\Controllers;

use App\Models\Nursery;
use App\Models\State;
use App\Models\Kid;
use App\Models\Teacher;
use Illuminate\Http\Request;

/**
 * Controller to manage states (regions/provinces) linked to entities like nurseries, kids, and teachers.
 */
class StateController extends Controller
{
    /**
     * Display a list of all states.
     */
    public function index()
    {
        $states = State::all();
        return view('state', compact('states'));
    }

    /**
     * Add a new state to the database.
     */
    public function add(Request $request)
    {
        State::create([
            'description' => $request->description,
        ]);
        return redirect()->route('List_State');
    }

    /**
     * Delete a state if it is not used by any nursery, kid, or teacher.
     */
    public function delete($id)
    {
        $state = State::findOrFail($id);

        if (Nursery::where('state_id', $id)->exists()) {
            return redirect()->route('List_State')->with('error', 'Cannot delete ' . $state->description . ' because a nursery is using it.');
        }

        if (Kid::where('state_id', $id)->exists()) {
            return redirect()->route('List_State')->with('error', 'Cannot delete ' . $state->description . ' because a kid is using it.');
        }

        if (Teacher::where('state_id', $id)->exists()) {
            return redirect()->route('List_State')->with('error', 'Cannot delete ' . $state->description . ' because a teacher is using it.');
        }

        $state->delete();
        return redirect()->route('List_State');
    }

    /**
     * Delete all states from the database.
     */
    public function clear()
    {
        State::query()->delete();
        return redirect()->route('List_State');
    }
}
