<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class ProfesorController extends Controller
{
    public function index()
    {
        // Lógica para la página principal del profesor
        return view('profesor.dashboard');

        Log::info("Se ha accedido a la página principal del profesor");
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
        return view('secretaria.crearprofesor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        
            
            $request->validate([
                'nombre_profesor' => 'required|max:255|string',
                'apellido' => 'required|max:255|string',
                'DNI' => 'required|numeric',
                'email' => 'required|email',
                'legajo' => 'required|numeric',
            ]);

            $profesors = new Profesor();

            
            $profesors->nombre_profesor = $request->get('nombre_profesor');
            $profesors->apellido = $request->get('apellido');
            $profesors->DNI = $request->get('DNI');
            $profesors->legajo = $request->get('legajo');
            $profesors->email = $request->get('email');
           
          //  $profesors->password =  Hash::make($request->get('lu'));
          

          
            $profesors->save();

            return redirect('/secretaria')->with('estado','El profesor fue creado correctamente.');
       
        
    
    }
}

