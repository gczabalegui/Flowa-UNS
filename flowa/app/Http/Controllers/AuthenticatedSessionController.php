<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // Lógica para autenticar al usuario
    }

    public function destroy()
    {
        // Lógica para cerrar la sesión del usuario
    }
}
