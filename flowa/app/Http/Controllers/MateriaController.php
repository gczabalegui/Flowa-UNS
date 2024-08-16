<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;
use App\Models\Profesor;
use App\Models\CarreraMateria;
use App\Models\Carrera; // Add this line
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
            $carreras = Carrera::all();
    
            if ($profesores->isEmpty()) {
                return redirect('/administracion')->with('warning', 'No hay profesores. Por favor, cree un profesor antes de crear una materia.');
            }
            if ($carreras->isEmpty()) {
                return redirect('/administracion')->with('warning', 'No hay carreras. Por favor, cree una carrera antes de crear una materia.');
            }
    
            return view('administracion.crearmateria', compact('profesores', 'carreras'));
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
                'codigo_materia' => 'required|numeric|unique:materias,codigo',
                'horas_semanales' => 'required|numeric|digits_between:1,2',
                'horas_totales' => 'required|numeric|digits_between:1,2',
                'profesor_id' => 'required|numeric',
                'carreras' => 'required|array',
                'carreras.*' => 'exists:carreras,id',
            ]);
    
            $materia = Materia::create($request->only(['nombre_materia', 'codigo', 'profesor_id', 'horas_semanales', 'horas_totales']));
    
            $materia->carrera()->attach($request->carreras);

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
