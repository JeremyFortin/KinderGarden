<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Nursery;
use Illuminate\Http\Request;

class NurseryController extends Controller
{
    public function index()
    {
        $nurseries = Nursery::all();
        $states = State::all();
        return view('nursery', compact('nurseries', 'states'));
    }

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

    public function formModifyNursery($id)
    {
        $nursery = Nursery::findOrFail($id);
        $states = State::all();
        return view('nurseryModify', compact('nursery', 'states'));
    }

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

    public function delete($id)
    {
        $nursery = Nursery::findOrFail($id);
        $nursery->delete();
        return redirect()->route('List_Nursery');
    }

    public function clear()
    {
        Nursery::query()->delete();
        return redirect()->route('List_Nursery');
    }
}
