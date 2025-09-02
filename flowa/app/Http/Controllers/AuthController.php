<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Mostrar el formulario de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Procesar login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            // Redirige según rol
            $role = Auth::user()->role;
            switch ($role) {
                case 'profesor':
                    return redirect('/profesor');
                case 'comision':
                    return redirect('/comision');
                case 'administracion':
                    return redirect('/administracion');
                case 'secretaria':
                    return redirect('/secretaria');
                case 'admin':
                    return redirect('/welcome');
                default:
                    Auth::logout();
                    return redirect()->route('login')->withErrors('Usuario sin rol válido.');
            }
        }

        return back()->withErrors([
            'email' => 'Credenciales incorrectas.',
        ])->onlyInput('email');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
