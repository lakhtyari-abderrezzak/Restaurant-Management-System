<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Http\Requests\StoreTableRequest;
use App\Http\Requests\UpdateTableRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class TableController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tables = Table::paginate(10);
        return view('tables.index', ['tables' => $tables]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tables.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'status' => 'required',
        ]);
        $name = $request->name;
        Table::create([
            'name' => $name,
            'status' => $request->status,
            'slug' => Str::slug($name)
        ]);

        return redirect()->route('tables.index')->with('success', 'Servant added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Table $table)
    {
        return view('tables.show', compact('table'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Table $table)
    {
        return view('tables.edit', compact('table'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Table $table)
    {
        $request->validate([
            'name' => 'required|min:3',
            'status' => 'required',
        ]);
        $name = $request->name;
        $table->update([
            'name' => $name,
            'status' => $request->status,
            'slug' => Str::slug($name)
        ]);
        return redirect()->route('tables.index')->with('success', 'Update was successfull');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table $table)
    {
        $table->delete();
        return redirect()->route('tables.index')->with('success', 'Delete was successfull');

    }
}