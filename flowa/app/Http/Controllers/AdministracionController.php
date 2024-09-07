<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administracion;
use App\Models\User;

class AdministracionController extends Controller
{
    public function index()
    {
    }

    public function dashboard()
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
        try {
            $request->validate([
                'nombre' => 'required|max:255|string',
                'apellido' => 'required|max:255|string',
                'DNI' => 'required|numeric',
                'legajo' => 'required|numeric',
                'email' => 'required|max:255|string',
                'contraseña' => 'required|string|min:8|confirmed',
            ]);

            $administraciones = new Administracion();
            $administraciones->nombre = $request->get('nombre');
            $administraciones->apellido = $request->get('apellido');
            $administraciones->DNI = $request->get('DNI');
            $administraciones->legajo = $request->get('legajo');
            $administraciones->email = $request->get('email');
            $administraciones->contraseña = bcrypt($request->contraseña);

            $user = new User();
            $user->legajo = $request->get('legajo');
            $user->email = $request->get('email');
            $user->password = bcrypt($request->get('contraseña'));
            $user->role = 'administracion';
            $user->save();

            $administraciones->save();
            return redirect('/administracion')->with('estado', 'Nuevo usuario Administrativo creado exitosamente.');
        } catch (\Exception $e) {
            return redirect('/administracion')->with('warning', 'No se ha podido crear el nuevo usuario. Detalles: ' . $e->getMessage());
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
