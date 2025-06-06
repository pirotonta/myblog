<section>
    <header class="mb-6">
        <h1 class="text-3xl font-bold text-white mb-1">Información del perfil</h1>
        <p class="text-sm text-gray-400">Actualiza el nombre de usuario o dirección de email.</p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Nombre de usuario')" class="text-gray-300" />
            <x-text-input id="name" name="name" type="text"
                class="mt-1 block w-full bg-zinc-800 border-zinc-700 text-white rounded-md shadow-sm"
                :value="old('name', $user->username)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2 text-red-400" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" class="text-gray-300" />
            <x-text-input id="email" name="email" type="email"
                class="mt-1 block w-full bg-zinc-800 border-zinc-700 text-white rounded-md shadow-sm"
                :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2 text-red-400" :messages="$errors->get('email')" />
        </div>

        <div class="flex items-center gap-4 pt-4">
            <x-primary-button class="bg-zinc-800 border border-gray-600 text-white cursor-pointer">
                {{ __('Guardar') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-400">Guardado</p>
            @endif
        </div>
    </form>
</section>