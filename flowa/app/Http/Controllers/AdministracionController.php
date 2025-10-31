<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administracion;
use App\Models\User;
use App\Models\Plan;
use App\Models\Profesor;
use App\Models\Materia;
use Illuminate\Support\Facades\DB;

class AdministracionController extends Controller
{
    public function dashboard()
    {
        $totalPlanes = Plan::count();
        $planesPorEstado = Plan::select('estado', DB::raw('count(*) as total'))
            ->groupBy('estado')
            ->pluck('total', 'estado');

        $planesPorAnio = Plan::select('anio', DB::raw('count(*) as total'))
            ->groupBy('anio')
            ->orderBy('anio')
            ->pluck('total', 'anio');

        $totalProfesores = Profesor::count();
        $totalMaterias = Materia::count();

        return view('administracion.dashboard', compact(
            'totalPlanes',
            'planesPorEstado',
            'planesPorAnio',
            'totalProfesores',
            'totalMaterias'
        ));
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
            ]);

            $administraciones = new Administracion();
            $administraciones->nombre = $request->get('nombre');
            $administraciones->apellido = $request->get('apellido');
            $administraciones->DNI = $request->get('DNI');
            $administraciones->legajo = $request->get('legajo');
            $administraciones->email = $request->get('email');
            $administraciones->contraseña = bcrypt($request->get('legajo'));

            $user = new User();
            $user->legajo = $request->get('legajo');
            $user->email = $request->get('email');
            $user->password = bcrypt($request->get('legajo'));
            $user->role = 'administracion';
            $user->save();

            $administraciones->save();
            return redirect('/administracion')->with('estado', 'Nuevo usuario Administrativo creado exitosamente.');
        } catch (\Exception $e) {
            return redirect('/administracion')->with('warning', 'No se ha podido crear el nuevo usuario. Detalles: ' . $e->getMessage());
        }
    }
}
