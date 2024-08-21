<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'legajo' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('legajo', 'password');

        if (Auth::attempt(['legajo' => $credentials['legajo'], 'password' => $credentials['password']])) {
            // Authentication passed...
            $user = Auth::user();
            switch ($user->role) {
                case 'comision':
                    return redirect()->intended('/comision/dashboard');
                case 'secretaria':
                    return redirect()->intended('/secretaria/dashboard');
                case 'profesor':
                    return redirect()->intended('/profesor/dashboard');
                case 'administracion':
                    return redirect()->intended('/administracion/dashboard');
                default:
                    Auth::logout();
                    return back()->withErrors([
                        'legajo' => 'No tiene permisos para acceder a este sistema.',
                    ]);
            }
        }

        return back()->withErrors([
            'legajo' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }
}