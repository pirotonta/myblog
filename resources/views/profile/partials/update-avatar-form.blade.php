@php
$avatars = [
'/userpfps/1.png',
'/userpfps/2.png',
'/userpfps/3.png',
'/userpfps/4.png',
'/userpfps/5.png',
'/userpfps/6.png',
'/userpfps/7.png',
'/userpfps/8.png',
'/userpfps/9.png',
'/userpfps/10.png',
];
@endphp

<form method="POST" action="{{ route('profile.avatar') }}">
    @csrf
    @method('PATCH')

    <h1 class="text-3xl font-bold text-white mb-5">Elegir avatar</h1>

    <div class="grid grid-cols-5 gap-4 justify-items-center mb-4">
        @foreach ($avatars as $avatar)
        <label class="cursor-pointer relative group">
            <input
                type="radio"
                name="profile_picture"
                value="{{ $avatar }}"
                class="sr-only avatar-radio"
                @if (auth()->user()->profile_picture === $avatar) checked @endif
            >
            <img
                src="{{ asset($avatar) }}"
                class="avatar-img w-20 h-20 rounded-full border-4 transition-all duration-200 ease-in-out
        @if(auth()->user()->profile_picture === $avatar)
            border-gray-500 shadow-lg
        @else
            border-transparent group-hover:border-gray-300
        @endif">
        </label>
        @endforeach
    </div>

    <x-primary-button class="bg-zinc-800 border border-gray-600 text-white cursor-pointer">
        {{ __('Guardar') }}
    </x-primary-button>
</form>

<script>
    const radios = document.querySelectorAll('.avatar-radio');
    const avatars = document.querySelectorAll('.avatar-img');

    radios.forEach((radio, index) => {
        radio.addEventListener('change', () => {
            // quito estilos de todos los avatares
            avatars.forEach(img => {
                img.classList.remove('border-gray-500', 'shadow-lg');
                img.classList.add('border-transparent');
            });

            // pongo estilo al avatar seleccionado
            avatars[index].classList.remove('border-transparent');
            avatars[index].classList.add('border-gray-500', 'shadow-lg');
        });
    });
</script>