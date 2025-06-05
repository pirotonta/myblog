<x-guest-layout>
    <div class="max-w-md mx-auto bg-zinc-900 shadow-md rounded-md p-8 border border-zinc-700">

        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf

            <h3 class="font-bold text-2xl mb-10 text-white">Crear cuenta</h3>

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Nombre de usuario')" class="text-gray-300" />
                <x-text-input
                    id="name"
                    class="block mt-1 w-full bg-transparent border border-zinc-700 text-gray-100 focus:ring-indigo-500 focus:border-indigo-500"
                    type="text"
                    name="name"
                    :value="old('name')"
                    required
                    autofocus
                    autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-400" />
            </div>

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-gray-300" />
                <x-text-input
                    id="email"
                    class="block mt-1 w-full bg-transparent border border-zinc-700 text-gray-100 focus:ring-indigo-500 focus:border-indigo-500"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-400" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Contraseña')" class="text-gray-300" />
                <x-text-input
                    id="password"
                    class="block mt-1 w-full bg-transparent border border-zinc-700 text-gray-100 focus:ring-indigo-500 focus:border-indigo-500"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-400" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" class="text-gray-300" />
                <x-text-input
                    id="password_confirmation"
                    class="block mt-1 w-full bg-transparent border border-zinc-700 text-gray-100 focus:ring-indigo-500 focus:border-indigo-500"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-400" />
            </div>

            <!-- Submit -->
            <div class="flex justify-end">
                <x-primary-button class="text-white font-semibold px-4 py-2 rounded-md cursor-pointer">
                    Registrarme
                </x-primary-button>
            </div>

            <!-- Link -->
            <div class="text-center mt-4">
                <a class="text-sm text-gray-400 hover:text-white transition" href="{{ route('login') }}">
                    ¿Ya estás registrado?
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>