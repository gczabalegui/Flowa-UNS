<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesor;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Plan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ProfesorController extends Controller
{
    public function index()
    {
        $profesores = Profesor::all();
        return view('administracion.verprofesores')->with('profesores', $profesores);
    }

    public function dashboard()
    {
        $user = auth()->user();

        // Si es admin, mostramos todos los planes
        if ($user->role === 'admin') {
            $planesQuery = Plan::query();
        } else {
            // Si es profesor, solo sus planes
            $planesQuery = Plan::where('profesor_id', $user->profesor->id);
        }

        // Datos numéricos
        $totalPlanes = (clone $planesQuery)->count();
        $planesPendientes = (clone $planesQuery)
            ->whereIn('estado', ['Incompleto por profesor responsable.', 'Rectificado por administración para profesor responsable.', 'Completo por administración.'])
            ->count();
        $planesAprobados = (clone $planesQuery)
            ->where('estado', 'Aprobado por secretaría académica.')
            ->count();
        $planesRechazados = (clone $planesQuery)
            ->where('estado', 'Rechazado para profesor responsable por secretaría académica.')
            ->count();

        // Gráfico por estado
        $planesPorEstado = (clone $planesQuery)
            ->select('estado', DB::raw('count(*) as total'))
            ->whereIn('estado', [
                'Completo por administración.',
                'Rechazado para profesor responsable por secretaría académica.',
                'Incompleto por profesor responsable.',
                'Rectificado por administración para profesor responsable.',
                'Aprobado por secretaría académica.'
            ])
            ->groupBy('estado')
            ->pluck('total', 'estado');

        // Últimas modificaciones (5 más recientes)
        // Últimas modificaciones (5 más recientes)
        $ultimasModificaciones = (clone $planesQuery)
            ->with('materia') // Traemos la materia asociada
            ->orderBy('updated_at', 'desc')
            ->take(5)
            ->get(['id', 'materia_id', 'estado', 'updated_at']);


        return view('profesor.dashboard', compact(
            'totalPlanes',
            'planesPendientes',
            'planesAprobados',
            'planesRechazados',
            'planesPorEstado',
            'ultimasModificaciones'
        ));
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
                return redirect('/secretaria')->with('estado', 'Nuevo usuario profesor responsable creado exitosamente.');
            } else {
                return redirect('/administracion')->with('estado', 'Nuevo usuario profesor responsable creado exitosamente.');
            }
        } catch (\Exception $e) {
            if (auth()->user()->role === 'secretaria') {
                return redirect('/secretaria')->with('warning', 'No se ha podido crear el nuevo usuario. Error: ' . $e->getMessage());
            } else {
                return redirect('/administracion')->with('warning', 'No se ha podido crear el nuevo usuario. Error: ' . $e->getMessage());
            }
        }
    }
}
