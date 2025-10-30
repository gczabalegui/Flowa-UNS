<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionRoleController extends Controller
{
    /**
     * Muestra el dashboard principal del admin
     * y limpia cualquier rol “impersonado”.
     */
    public function dashboard()
    {
        // Limpiar rol activo si existía
        session()->forget('impersonate_role');

        return view('welcome'); // Tu vista del dashboard principal
    }

    /**
     * Permite al admin cambiar temporalmente de rol.
     */
    public function cambiarRol($rol)
    {
        $user = Auth::user();

        // Validamos que el usuario sea admin
        if ($user->role !== 'admin') {
            abort(403, 'Solo el administrador puede cambiar de rol.');
        }

        // Lista de roles válidos
        $rolesValidos = ['administracion', 'comision', 'secretaria', 'profesor'];

        if (!in_array($rol, $rolesValidos)) {
            abort(404, 'Rol no válido.');
        }

        // Guardamos el rol elegido en sesión
        session(['impersonate_role' => $rol]);

        // Redirigimos a la sección correspondiente
        return redirect("/{$rol}")->with('status', "Has ingresado como {$rol}.");
    }
}
