<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
        <div class="div" style="opacity: 50%; font-size: 40px">
                Flowa - UNS
            </div>
            <div class="div" style="opacity: 50%; font-size: 18px; text-align: center;">
                Comisión Académica
            </div>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('comision.login') }}">
            @csrf

            <!-- Legajo -->
            <div>
                <x-label for="legajo" :value="__('legajo')" />
                <x-input id="legajo" class="block mt-1 w-full" type="text" name="legajo" :value="old('legajo')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Contraseña')" />

                <x-input id="password" class="block mt-1 w-full"
                    type="password"
                    name="password"
                    required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Recordarme') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3">
                    {{ __('Ingresar') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>