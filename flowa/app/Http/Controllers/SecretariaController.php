<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Secretaria;
use App\Models\Plan;
use Illuminate\Support\Facades\DB;

class SecretariaController extends Controller
{
    public function index()
    {
    }

    public function dashboard()
    {
        $totalPlanes = Plan::count();
        $planesPendientes = Plan::where('estado', 'Completo por profesor responsable.')->count();
        $planesObservados = Plan::where('estado', 'Rectificado por administración para secretaría académica.', 'Rectificado por profesor responsable para secretaría académica.')->count();

        // Conteo por estado para gráfico
        $planesPorEstado = Plan::select('estado', DB::raw('count(*) as total'))
            ->groupBy('estado')
            ->pluck('total', 'estado');

        return view('secretaria.dashboard', compact(
            'totalPlanes',
            'planesPendientes',
            'planesObservados',
            'planesPorEstado'
        ));
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
        try {
            $request->validate([
                'nombre_secretaria' => 'required|max:255|string',
                'apellido_secretaria' => 'required|max:255|string',
                'DNI_secretaria' => 'required|digits_between:1,8|numeric|unique:secretarias,DNI_secretaria',
                'legajo_secretaria' => 'required|digits_between:1,5|numeric|unique:secretarias,legajo_secretaria',
                'email_secretaria' => 'required|max:255|string|email|unique:secretarias,email_secretaria',
            ]);

            Secretaria::create([
                'nombre_secretaria' => $request->nombre_secretaria,
                'apellido_secretaria' => $request->apellido_secretaria,
                'DNI_secretaria' => $request->DNI_secretaria,
                'legajo_secretaria' => $request->legajo_secretaria,
                'email_secretaria' => $request->email_secretaria,
                'departamento_id' => '1',
            ]);

            if (auth()->user()->role === 'secretaria') {
                return redirect('/secretaria')->with('estado', 'Nuevo usuario de Secretaría Académica creado exitosamente.');
            } else {
                return redirect('/administracion')->with('estado', 'Nuevo usuario de Secretaría Académica creado exitosamente.');
            }
        } catch (\Exception $e) {
            if (auth()->user()->role === 'secretaria') {
                return redirect('/secretaria')->with('warning', 'No se ha podido crear el nuevo usuario. Detalles: ' . $e->getMessage());
            } else {
                return redirect('/administracion')->with('warning', 'No se ha podido crear el nuevo usuario. Detalles: ' . $e->getMessage());
            }
        }
    }
}
