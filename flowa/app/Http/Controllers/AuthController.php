<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticación exitosa, redirigir al dashboard o cualquier otra vista
            return redirect()->intended('dashboard');
        }

        // Autenticación fallida, redirigir de vuelta al formulario de login con un error
        return redirect()->back()->withErrors(['email' => 'Las credenciales no coinciden.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
