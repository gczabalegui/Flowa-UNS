<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesor;
use Illuminate\Support\Facades\Log;
use App\Models\User;


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
        try {
            $request->validate([
                'nombre_profesor' => 'required|max:255|string',
                'apellido_profesor' => 'required|max:255|string',
                'DNI_profesor' => 'required|digits_between:1,8|numeric|unique:profesors,DNI_profesor',
                'email_profesor' => 'required|email|unique:profesors,email_profesor',
                'legajo_profesor' => 'required|digits_between:1,5|numeric|unique:profesors,legajo_profesor',
                'contraseña_profesor' => 'required|string|min:8|confirmed',
            ]);
    
            $profesor = new Profesor();
            $profesor->nombre_profesor = $request->get('nombre_profesor');
            $profesor->apellido_profesor = $request->get('apellido_profesor');
            $profesor->DNI_profesor = $request->get('DNI_profesor');
            $profesor->email_profesor = $request->get('email_profesor');
            $profesor->legajo_profesor = $request->get('legajo_profesor');
            $profesor->contraseña_profesor = bcrypt($request->contraseña_profesor);
            $profesor->save();
    
            $user = new User();
            $user->legajo = $request->get('legajo_profesor');
            $user->email = $request->get('email_profesor');
            $user->password = bcrypt($request->get('contraseña_profesor'));
            $user->role = 'profesor';
            $user->save();
    
            if (auth()->user()->role === 'secretaria') {
                return redirect('/secretaria')->with('estado', 'Nuevo usuario Profesor creado exitosamente.');
            } else {
                return redirect('/administracion')->with('estado', 'Nuevo usuario Profesor creado exitosamente.');
            }
        }
        catch(\Exception $e) {
            if (auth()->user()->role === 'secretaria') {
                return redirect('/secretaria')->with('warning', 'No se ha podido crear el nuevo usuario. Error: ' . $e->getMessage());
            } else {
                return redirect('/administracion')->with('warning', 'No se ha podido crear el nuevo usuario. Error: ' . $e->getMessage());
            }
        }      
    }
}

