<?php

namespace App\Http\Controllers;

use App\Models\Commerce;
use Illuminate\Http\Request;

class CommerceController extends Controller
{
    public function index()
    {
        $commerces = Commerce::all();
        return view('commerce', compact('commerces'));
    }

    public function add(Request $request)
    {
        Commerce::create([
            'description' => $request->description,
            'address' => $request->address,
            'phone' => $request->phone
        ]);
        return redirect()->route('List_Commerce');
    }

    public function formModifyCommerce($id)
    {
        $commerce = Commerce::findOrFail($id);
        return view('commerceModify', compact('commerce'));
    }

    public function update($id, Request $request)
    {
        $commerce = Commerce::findOrFail($id);

        $commerce->description = $request->description;
        $commerce->address = $request->address;
        $commerce->phone = $request->phone;

        $commerce->save();

        return redirect()->route('List_Commerce');
    }

    public function delete($id)
    {
        $commerce = Commerce::findOrFail($id);
        $commerce->delete();
        return redirect()->route('List_Commerce');
    }

    public function clear()
    {
        Commerce::query()->delete();
        return redirect()->route('List_Commerce');
    }
}
