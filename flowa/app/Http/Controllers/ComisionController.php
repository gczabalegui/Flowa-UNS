<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComisionController extends Controller
{
    public function index()
    {
        // Lógica para la página principal de comision
        return view('comision.dashboard');
    }

    /*
    public function verPlan() 
    {
        return view('comision.verplan');
    }
    */
}
