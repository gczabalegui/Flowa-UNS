<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesor;
use Illuminate\Support\Facades\Log;


class ProfesorController extends Controller
{
    public function index()
    {
        $profesores = Profesor::all();
        return view('administracion.verprofesores')->with('profesores', $profesores);
    }

    public function dashboard(){
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
    public function createByAdmin()
    {
        return view('administracion.crearprofesor');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createBySec()
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
        try{               
            $request->validate([
                'nombre_profesor' => 'required|max:255|string',
                'apellido_profesor' => 'required|max:255|string',
                'DNI_profesor' => 'required|digits_between:1,8|numeric|unique:profesors,DNI_profesor',
                'email_profesor' => 'required|email|unique:profesors,email_profesor',
                'legajo_profesor' => 'required|digits_between:1,5|numeric|unique:profesors,legajo_profesor',
            ]);

            Profesor::create($request->all());
          
            return redirect('/administracion')->with('estado', 'Nuevo usuario Profesor creado exitosamente.');
        }
        catch(\Exception $e){
            return redirect('/administracion')->with('warning', 'No se ha podido crear el nuevo usuario. Error: ' . $e->getMessage());
        }      
    }
}

