<section>
    <header class="mb-6">
        <h1 class="text-3xl font-bold text-white mb-1">Actualizar contraseña</h1>
        <p class="text-sm text-gray-400">
            Asegurate que tu cuenta esté utilizando una contraseña larga y aleatoria para mantenerte seguro.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Contraseña actual')" class="text-gray-300" />
            <x-text-input
                id="update_password_current_password"
                name="current_password"
                type="password"
                class="mt-1 block w-full bg-zinc-800 border-zinc-700 text-white focus:ring-gray-500 focus:border-gray-500 rounded-md shadow-sm"
                autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-red-400" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('Contraseña nueva')" class="text-gray-300" />
            <x-text-input
                id="update_password_password"
                name="password"
                type="password"
                class="mt-1 block w-full bg-zinc-800 border-zinc-700 text-white focus:ring-gray-500 focus:border-gray-500 rounded-md shadow-sm"
                autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-red-400" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirmar contraseña')" class="text-gray-300" />
            <x-text-input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                class="mt-1 block w-full bg-zinc-800 border-zinc-700 text-white focus:ring-gray-500 focus:border-gray-500 rounded-md shadow-sm"
                autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-red-400" />
        </div>

        <div class="flex items-center gap-4 pt-4">
            <x-primary-button class="bg-zinc-800 border border-gray-600 text-white cursor-pointer">
                {{ __('Guardar') }}
            </x-primary-button>

            @if (session('status') === 'password-updated')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-400">Guardado</p>
            @endif
        </div>
    </form>
</section>