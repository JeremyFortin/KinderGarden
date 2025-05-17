<?php

namespace App\Http\Controllers;

use App\Models\Presence;
use App\Models\Kid;
use App\Models\Teacher;
use Illuminate\Http\Request;

/**
 * Controller for managing kid presences in the nursery.
 */
class PresenceController extends Controller
{
    /**
     * Display a list of all presences with related kids and teachers.
     */
    public function index()
    {
        $presences = Presence::all();
        $kids = Kid::all();
        $teachers = Teacher::all();
        return view('presence', compact('presences', 'kids', 'teachers'));
    }

    /**
     * Store a new presence entry.
     */
    public function add(Request $request)
    {
        Presence::create([
            'presence_date' => $request->presence_date,
            'kid_id' => $request->kid_id,
            'teacher_id' => $request->teacher_id,
        ]);
        return redirect()->route('List_Presence');
    }

    /**
     * Delete a specific presence entry.
     */
    public function delete($id)
    {
        $presence = Presence::findOrFail($id);
        $presence->delete();
        return redirect()->route('List_Presence');
    }

    /**
     * Delete all presence records.
     */
    public function clear()
    {
        Presence::query()->delete();
        return redirect()->route('List_Presence');
    }
}
