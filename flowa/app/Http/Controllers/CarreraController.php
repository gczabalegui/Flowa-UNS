<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarreraController extends Controller
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
        return view('administracion.crearcarrera');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'codigo_carrera' => 'required|numeric', 
                'nombre_carrera' => 'required|max:255|string',
                'plan_version' => 'required|numeric',
                'duracion' => 'required|max:255|string',
                'cant_materias' => 'required|numeric',

            ]);

            $carreras = new Carrera();
            $carreras->codigo_carrera = $request->get('codigo_carrera');
            $carreras->nombre_carrera = $request->get('nombre_carrera');
            $carreras->plan_version = $request->get('plan_version');
            $carreras->duracion = $request->get('duracion');
            $carreras->cant_materias = $request->get('cant_materias');

            $carreras->save();
            return redirect('/administracion')->with('estado', 'Nueva carrera creada exitosamente.');
        }
        catch(\Exception $e){
            return redirect('/administracion')->with('warning', 'No se ha podido crear la carrera.');
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
