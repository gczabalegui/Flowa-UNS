<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;             // <<< NUEVO
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Log;              // <<< NUEVO

class ProfileController extends Controller
{

    public function dashboard(){
        // Lógica para la página principal del profesor
        return view('welcome');

        Log::info("Se ha accedido a la página principal de administración");
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
{
    $role = $request->user()->role;
    
    // Mapea el rol a la carpeta de vistas. Asumimos que 'admin' y 'secretaria' usan 'profesor' o tienen sus propias carpetas.
    $viewPath = match ($role) {
        'comision' => 'comision.profile.profile', // Buscará views/comision/profile/profile.blade.php
        'administracion' => 'administracion.profile.profile', // Buscará views/administracion/profile/profile.blade.php
        'secretaria' => 'secretaria.profile.profile', // Buscará views/secretaria/profile/profile.blade.php
        'profesor' => 'profesor.profile.profile', // Buscará views/profesor/profile/profile.blade.php
        default => 'comision.profile.profile', // Default (Profesor, Admin)
    };
    
    return view($viewPath, [
        'user' => $request->user(),
    ]);
}

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }


    public function updatePassword(Request $request): RedirectResponse
    {
        // 1. Validar la contraseña actual y la nueva contraseña
        $validated = $request->validate([
            // current_password verifica automáticamente contra la contraseña hasheada del usuario autenticado
            'current_password' => ['required', 'string', 'current_password'], 
            
            // La nueva contraseña debe cumplir las reglas (al menos 8 caracteres, etc.) y ser confirmada (campo password_confirmation)
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        // 2. Si la validación pasa, actualiza la contraseña
        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        // 3. Redirigir con mensaje de éxito
        return Redirect::route('profile.edit')->with('success', '¡Contraseña actualizada exitosamente!');
    }
    
    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
