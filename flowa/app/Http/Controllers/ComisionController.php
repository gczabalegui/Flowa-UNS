<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comision;
use App\Models\Carrera;
use Illuminate\Support\Facades\Auth;

class ComisionController extends Controller
{
    public function index()
    {

    }

    public function dashboard(){
         // Lógica para la página principal de comision
         return view('comision.dashboard');       
    }
        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createByAdmin()
    {
        $carreras = Carrera::all();
        return view('administracion.crearcomision', compact('carreras'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createBySec()
    {
        $carreras = Carrera::all();
        return view('secretaria.crearcomision', compact('carreras'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([               
                'nombre_comision' => 'required|max:255|string',
                'apellido' => 'required|max:255|string',
                'DNI' => 'required|numeric',
                'legajo' => 'required|numeric',
                'email' => 'required|max:255|string',
                'carrera_responsable' => 'required|max:255|string',
            ]);

            $comisiones = new Comision();
            $comisiones->nombre_comision = $request->get('nombre_comision');
            $comisiones->apellido = $request->get('apellido');
            $comisiones->DNI = $request->get('DNI');
            $comisiones->legajo = $request->get('legajo');
            $comisiones->email = $request->get('email');
            $comisiones->carrera_responsable = $request->get('carrera_responsable');

            $comisiones->save();
            return redirect('/administracion')->with('estado', 'Nuevo usuario de la Comisión Curricular creado exitosamente.'); 
        }
        catch(\Exception $e){
            return redirect('/administracion')->with('warning', 'No se ha podido crear el nuevo usuario. Detalles: ' . $e->getMessage());
        }      
    }
    /*
    public function verPlan() 
    {
        return view('comision.verplan');
    }
    */

    public function showLoginForm()
    {
        return view('comision.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/comision/dashboard');
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }
}
