<?php

namespace App\Http\Controllers;

use App\Models\Kid;
use App\Models\Presence;
use App\Models\State;
use Illuminate\Http\Request;

/**
 * Controller for managing Kid entities.
 */
class KidController extends Controller
{
    /**
     * Display a listing of kids along with available states.
     */
    public function index()
    {
        $kids = Kid::all();
        $states = State::all();
        return view('kid', compact('kids', 'states'));
    }

    /**
     * Store a new kid in the database.
     */
    public function add(Request $request)
    {
        Kid::create([
            'name' => $request->name,
            'firstName' => $request->firstName,
            'birthdate' => $request->birthdate,
            'address' => $request->address,
            'city' => $request->city,
            'state_id' => $request->state_id,
            'phone' => $request->phone,
        ]);
        return redirect()->route('List_Kid');
    }

    /**
     * Show the form to edit a specific kid and list their presences.
     */
    public function formModifyKid($id)
    {
        $kid = Kid::findOrFail($id);
        $states = State::all();
        $presences = Presence::where('kid_id', $id)->get();
        return view('kidModify', compact('kid', 'states', 'presences'));
    }

    /**
     * Update an existing kid.
     */
    public function update($id, Request $request)
    {
        $kid = Kid::findOrFail($id);

        $kid->name = $request->name;
        $kid->firstName = $request->firstName;
        $kid->birthdate = $request->birthdate;
        $kid->address = $request->address;
        $kid->city = $request->city;
        $kid->state_id = $request->state_id;
        $kid->phone = $request->phone;

        $kid->save();

        return redirect()->route('List_Kid');
    }

    /**
     * Delete a specific kid and their presences.
     */
    public function delete($id)
    {
        $kid = Kid::findOrFail($id);
        Presence::where('kid_id', $id)->delete();
        $kid->delete();
        return redirect()->route('List_Kid');
    }

    /**
     * Delete all kids.
     */
    public function clear()
    {
        Kid::query()->delete();
        return redirect()->route('List_Kid');
    }
}
