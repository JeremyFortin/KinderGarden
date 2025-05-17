<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\State;
use App\Models\Presence;
use Illuminate\Http\Request;

/**
 * Controller to manage teachers and their related data.
 */
class TeacherController extends Controller
{
    /**
     * Display a list of all teachers and states.
     */
    public function index()
    {
        $teachers = Teacher::all();
        $states = State::all();
        return view('teacher', compact('teachers', 'states'));
    }

    /**
     * Add a new teacher.
     */
    public function add(Request $request)
    {
        Teacher::create([
            'name' => $request->name,
            'firstName' => $request->firstName,
            'birthdate' => $request->birthdate,
            'address' => $request->address,
            'city' => $request->city,
            'state_id' => $request->state_id,
            'phone' => $request->phone,
        ]);
        return redirect()->route('List_Teacher');
    }

    /**
     * Show the form to modify an existing teacher.
     */
    public function formModifyTeacher($id)
    {
        $teacher = Teacher::findOrFail($id);
        $states = State::all();
        $presences = Presence::where('teacher_id', $id)->get();
        return view('teacherModify', compact('teacher', 'states', 'presences'));
    }

    /**
     * Update the details of a teacher.
     */
    public function update($id, Request $request)
    {
        $teacher = Teacher::findOrFail($id);

        $teacher->name = $request->name;
        $teacher->firstName = $request->firstName;
        $teacher->birthdate = $request->birthdate;
        $teacher->address = $request->address;
        $teacher->city = $request->city;
        $teacher->state_id = $request->state_id;
        $teacher->phone = $request->phone;

        $teacher->save();

        return redirect()->route('List_Teacher');
    }

    /**
     * Delete a teacher and all related presences.
     */
    public function delete($id)
    {
        $teacher = Teacher::findOrFail($id);
        Presence::where('teacher_id', $id)->delete();
        $teacher->delete();
        return redirect()->route('List_Teacher');
    }

    /**
     * Delete all teachers from the database.
     */
    public function clear()
    {
        Teacher::query()->delete();
        return redirect()->route('List_Teacher');
    }
}
