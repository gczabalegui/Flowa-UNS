<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}

