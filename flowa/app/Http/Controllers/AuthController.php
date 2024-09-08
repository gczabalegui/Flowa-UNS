<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validar los datos ingresados
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Intentar autenticar las credenciales
        if (Auth::attempt($credentials)) {
            // Si las credenciales son válidas, regenerar la sesión
            $request->session()->regenerate();

            // Obtener el usuario autenticado
            $user = Auth::user();

            // Obtener el rol del usuario
            $role = $user->role;

            // Redirigir al usuario según su rol
            switch ($role) {
                case 'secretaria':
                    return redirect('/dashboard/secretaria');
                case 'comision':
                    return redirect('/dashboard/comision');
                case 'administracion':
                    return redirect('/dashboard/administracion');
                case 'profesor':
                    return redirect('/dashboard/profesor');
                default:
                    // Redirigir a una página predeterminada o mostrar un mensaje de error
                    return redirect('/')->withErrors([
                        'error' => 'Rol no válido.',
                    ]);
            }
        }

        // Si las credenciales no son válidas, devolver un mensaje de error
        return back()->withErrors([
            'error' => 'Las credenciales no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }


    public function logout(Request $request)
{
    // Cerrar sesión del usuario
    Auth::logout();

    // Invalidar la sesión del usuario
    $request->session()->invalidate();

    // Regenerar el token de la sesión
    $request->session()->regenerateToken();

    // Redirigir al usuario a la página de inicio de sesión
    return redirect('/iniciar-sesion');
}
}
