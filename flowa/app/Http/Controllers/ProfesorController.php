<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesor;
use Illuminate\Support\Facades\Hash;

class ProfesorController extends Controller
{
    public function index()
    {
        // Lógica para la página principal del profesor
        return view('profesor.dashboard');
    }

    /*
    public function modificarPlan() {
        return view('profesor.modificarplan');
    }
    */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('secretaria.creardocente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        try{
            /*
            $request->validate([
                'nombre' => 'required|max:255|string',
                'apellido' => 'required|max:255|string',
            ]);
            */

            $profesors = new Profesor();

            /*
            $profesors->nombre = $request->get('nombre');
            $profesors->apellido = $request->get('apellido');
           
          //  $profesors->password =  Hash::make($request->get('lu'));
          */

            $profesors->save();

            return redirect('/secretaria')->with('estado','El profesor fue creado correctamente.');
        }catch(\Exception $e){
            return redirect('/secretaria')->with('warning','Ya existe un profesor con ese legajo, DNI o email');
        }
    
    }
}

