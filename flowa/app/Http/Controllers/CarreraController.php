<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrera;
use App\Models\Departamento;
use Exception;

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
        try {
            $departamentos = Departamento::all();
    
            if ($departamentos->isEmpty()) {
                return redirect('/administracion')->with('warning', 'No hay departamentos. Por favor, cree un departamento antes de crear una carrera.');
            }
    
            return view('administracion.crearcarrera', compact('departamentos'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
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
                'departamento_id' => 'required|numeric',
            ]);

            Carrera::create($request->all());
 
            return redirect('/administracion')->with('estado', 'Nueva carrera creada exitosamente.');
        }
        catch(\Exception $e){
            return redirect('/administracion')->with('warning', 'No se ha podido crear la carrera. Error: ' . $e->getMessage());
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
