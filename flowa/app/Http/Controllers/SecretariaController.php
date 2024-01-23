<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecretariaController extends Controller
{
    public function index()
    {
        // Lógica para la página principal de administración
        return view('secretaria.dashboard');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function createByAdmin()
    {
        return view('administracion.crearsecretaria');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createBySec()
    {
        return view('secretaria.crearsecretaria');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'nombre_secretaria' => 'required|max:255|string',
                'apellido' => 'required|max:255|string',
                'DNI' => 'required|numeric',
                'legajo' => 'required|numeric',
                'email' => 'required|max:255|string',
            ]);

            $secretarias = new Secretaria();
            $secretarias->nombre_secretaria = $request->get('nombre_secretaria');
            $secretarias->apellido = $request->get('apellido');
            $secretarias->DNI = $request->get('DNI');
            $secretarias->legajo = $request->get('legajo');
            $secretarias->email = $request->get('email');


            $secretarias->save();
            return redirect('/secretaria')->with('estado', 'Nuevo usuario de Secretaría Académica creado exitosamente.'); 
        }
        catch(\Exception $e){
            return redirect('/secretaria')->with('warning', 'No se ha podido crear el nuevo usuario.');
        }     
    }
}
