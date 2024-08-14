<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;
use App\Models\Profesor;
use Exception;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        try {
            $profesores = Profesor::all();
    
            if ($profesores->isEmpty()) {
                throw new Exception('No hay profesores disponibles. Por favor, cree un profesor antes de crear una materia.');
            }
    
            return view('crearmateria', compact('profesores'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $request->validate([
                'nombre_materia' => 'required|max:255|string',
                'codigo' => 'required|numeric|unique:materias,codigo',
            ]);

            Materia::create($request->all());

            return redirect('/administracion')->with('estado', 'Nueva materia creada exitosamente.');
        } catch (\Exception $e) {

            return redirect('/administracion')->with('warning', 'No se ha podido crear la materia. Error: ' . $e->getMessage());
        }
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
