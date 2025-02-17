<?php

namespace App\Http\Controllers;

use App\Models\Informacion;
use Illuminate\Http\Request;

class InformacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $informaciones = Informacion::all();
        return view('informacion.index', compact('informaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('informacion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
        ]);

        $informacion = Informacion::create($validated);

        return redirect()->route('informacion.index')->with('success', 'Información creada con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Informacion $informacion)
    {
        return view('informacion.show', compact('informacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Informacion $informacion)
    {
        return view('informacion.edit', compact('informacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Informacion $informacion)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
        ]);

        $informacion->update($validated);

        return redirect()->route('informacion.index')->with('success', 'Información actualizada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Informacion $informacion)
    {
        $informacion->delete();

        return redirect()->route('informacion.index')->with('success', 'Información eliminada con éxito.');
    }
}
