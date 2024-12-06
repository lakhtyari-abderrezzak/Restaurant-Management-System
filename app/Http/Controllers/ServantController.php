<?php

namespace App\Http\Controllers;

use App\Models\Servant;
use App\Http\Requests\StoreServantRequest;
use App\Http\Requests\UpdateServantRequest;
use Illuminate\Http\Request;

class ServantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $servants = Servant::paginate(8);
        return view('servants.index', ['servants' => $servants]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('servants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
        ]);

        Servant::create([
            'name' => $request->name,
            'address' => $request->address,
        ]);

        return redirect()->route('servants.index')->with('success', 'Servant added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Servant $servant)
    {
        return view('servants.show', compact('servant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servant $servant)
    {
        return view('servants.edit', compact('servant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Servant $servant)
    {
        $request->validate([
            'name' => 'required|min:3',
            'address' => 'required|min:3',
        ]);

        $servant->update([
            'name' => $request->name,
            'address' => $request->address,
        ]);

        return redirect()->route('servants.index')->with('success', 'Update was successfull');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servant $servant)
    {
        $servant->delete();
        return redirect()->route('servants.index')->with('success', 'Delete was successfull');

    }
}
