<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('administracion.crearmateria');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'nombre_materia' => 'required|max:255|string',
                'codigo' => 'required|numeric',
            ]);

            $materias = new Materia();
            $materias->nombre_materia = $request->get('nombre_materia');
            $materias->codigo = $request->get('codigo');

            $materias->save();
            return redirect('/administracion')->with('estado', 'Nueva materia creada exitosamente.'); 
        }
        catch(\Exception $e){
            return redirect('/administracion')->with('warning', 'No se ha podido crear el plan.');
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
