<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;

class DepartamentoController extends Controller
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
        return view('administracion.creardepartamento');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'codigo_departamento' => 'required|numeric|unique:departamentos,codigo_departamento', 
                'nombre_departamento' => 'required|max:255|string|unique:departamentos,nombre_departamento',
                'calle_departamento' => 'required|max:255|string',
                'numero_departamento' => 'required|numeric|digits_between:1,5',
                'sitio_web_departamento' => 'required|max:255|string',       
            ]);

            Departamento::create($request->all());
 
            return redirect('/administracion')->with('estado', 'Nuevo departamento creado exitosamente.');
        }
        catch(\Exception $e){
            return redirect('/administracion')->with('warning', 'No se ha podido crear el nuevo departamento. Error: ' . $e->getMessage());
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
