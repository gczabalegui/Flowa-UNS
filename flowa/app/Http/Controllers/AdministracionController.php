<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministracionController extends Controller
{
    public function index()
    {
        // Lógica para la página principal de administración
        return view('administracion.dashboard');
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administracion.crearadministrativo');
    }

    public function store(Request $request)
    {
        try{
            $request->validate([               
                'nombre_administrativo' => 'required|max:255|string',
                'apellido' => 'required|max:255|string',
                'DNI' => 'required|numeric',
                'legajo' => 'required|numeric',
                'email' => 'required|max:255|string',
            ]);

            $administraciones = new Administracion();
            $administraciones->nombre_administrativo = $request->get('nombre_administrativo');
            $administraciones->apellido = $request->get('apellido');
            $administraciones->DNI = $request->get('DNI');
            $administraciones->legajo = $request->get('legajo');
            $administraciones->email = $request->get('email');

            $administraciones->save();
            return redirect('/administracion')->with('estado', 'Nuevo usuario Administrativo creado exitosamente.'); 
        }
        catch(\Exception $e){
            return redirect('/administracion')->with('warning', 'No se ha podido crear el nuevo usuario.');
        }     
        
    
    }
    /*
    public function crearPlan()
    {
        // Lógica para la página de crear plan
        return view('administracion.crearplan');
    }
    */

}

