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

    /*
    public function crearPlan()
    {
        // Lógica para la página de crear plan
        return view('administracion.crearplan');
    }
    */

}

