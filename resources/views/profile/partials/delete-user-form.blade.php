<section class="space-y-6">
    <header class="mb-6">
        <h1 class="text-3xl font-bold text-white mb-1">
            Eliminar cuenta
        </h1>
        <p class="text-sm text-gray-400">
            Una vez que se elimine tu cuenta, todos tus recursos y datos se eliminarán permanentemente.
        </p>
    </header>

    <x-danger-button
        class="bg-red-700 hover:bg-red-600 border border-red-500 text-white cursor-pointer"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
        Eliminar cuenta
    </x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 bg-zinc-900 rounded-md shadow-md">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-white">
                ¿Estás seguro de que querés eliminar tu cuenta?
            </h2>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Contraseña') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4 bg-zinc-800 border-zinc-700 text-white focus:ring-gray-500 focus:border-gray-500 rounded-md shadow-sm"
                    placeholder="{{ __('Contraseña') }}" />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-red-400" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button
                    class="border border-gray-600 text-white hover:border-red-400 cursor-pointer"
                    x-on:click="$dispatch('close-modal', 'confirm-user-deletion')">
                    Cancelar
                </x-secondary-button>

                <x-danger-button
                    class="ms-3 bg-red-700 hover:bg-red-600 border border-red-500 text-white cursor-pointer">
                    Borrar cuenta
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>