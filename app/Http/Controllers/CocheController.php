<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CocheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coches = \App\Models\Coche::all();
        return view('coches.index', compact('coches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('coches.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'marca' => 'required',
            'modelo' => 'required',
            'anio' => 'required|integer',
            'precio' => 'nullable|numeric',
            'color' => 'nullable|string',
        ]);
    
        \App\Models\Coche::create($validated);
        return redirect()->route('coches.index')->with('success', 'Coche creado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $coche = \App\Models\Coche::findOrFail($id);
        return view('coches.edit', compact('coche'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'marca' => 'required',
            'modelo' => 'required',
            'anio' => 'required|integer',
            'precio' => 'nullable|numeric',
            'color' => 'nullable|string',
        ]);
    
        $coche = \App\Models\Coche::findOrFail($id);
        $coche->update($request->all());
        return redirect()->route('coches.index')->with('success', 'Coche actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $coche = \App\Models\Coche::findOrFail($id);
        $coche->delete();
        return redirect()->route('coches.index')->with('success', 'Coche eliminado con éxito.');
    }
}
