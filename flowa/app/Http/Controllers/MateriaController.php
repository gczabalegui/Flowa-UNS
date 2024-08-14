<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;

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
        try {
            // Validación de los datos del formulario
            $request->validate([
                'nombre_materia' => 'required|max:255|string',
                'codigo' => 'required|numeric|unique:materias,codigo',
            ]);

            // Creación de una nueva instancia del modelo Materia
            $materias = new Materia();
            $materias->nombre_materia = $request->get('nombre_materia');
            $materias->codigo = $request->get('codigo');

            // Guardar la nueva materia en la base de datos
            $materias->save();

            // Redirigir con un mensaje de éxito
            return redirect('/administracion')->with('estado', 'Nueva materia creada exitosamente.');
        } catch (\Exception $e) {
            // Capturar cualquier excepción y redirigir con un mensaje de error
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
