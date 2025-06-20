<x-guest-layout>
    <div class="max-w-md mx-auto h-100 bg-zinc-900 shadow-md rounded-md p-8 border border-zinc-700">

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf
            <h3 class="font-bold text-2xl mb-10 text-white">Iniciar sesión</h3>
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('User/email')" class="text-gray-300" />
                <x-text-input
                    id="login"
                    class="block mt-1 w-full border border-zinc-700 text-gray-100 focus:ring-indigo-500 focus:border-indigo-500"
                    type="text"
                    name="login"
                    :value="old('login')"
                    required
                    autofocus
                    autocomplete="username" />
                <x-input-error :messages="$errors->get('login')" class="mt-2 text-sm text-red-400" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Contraseña')" class="text-gray-300" />
                <x-text-input
                    id="password"
                    class="block mt-1 w-full border border-zinc-700 text-gray-100 focus:ring-indigo-500 focus:border-indigo-500"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-400" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded bg-zinc-800 border-zinc-600 text-indigo-500 focus:ring-indigo-500"
                    name="remember">
                <label for="remember_me" class="ml-2 text-sm text-gray-400">
                    Mantener sesión iniciada
                </label>
            </div>

            <!-- Submit -->
            <div class="flex justify-end">
                <x-primary-button class="text-white font-semibold px-4 py-2 rounded-md cursor-pointer">
                    Ingresar
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>