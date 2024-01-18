<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecretariaController extends Controller
{
    public function index()
    {
        // Lógica para la página principal de administración
        return view('secretaria.dashboard');
    }
}
