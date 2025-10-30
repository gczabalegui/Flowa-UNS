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

    public function dashboard()
    {
        // Lógica para la página principal del profesor
        return view('welcome');

        Log::info("Se ha accedido a la página principal de administración");
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();

        // Usa el rol en sesión si existe (admin actuando como otro rol)
        $role = session('impersonate_role', $user->role);

        $viewPath = match ($role) {
            'comision' => 'comision.profile.profile',
            'administracion' => 'administracion.profile.profile',
            'secretaria' => 'secretaria.profile.profile',
            'profesor' => 'profesor.profile.profile',
            'admin' => 'admin.profile.profile',
            default => 'comision.profile.profile',
        };

        return view($viewPath, compact('user', 'role'));
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
