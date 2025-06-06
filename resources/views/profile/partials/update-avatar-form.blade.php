@php
$avatars = [
'userpfps/Bluebear_NH_Villager_Icon.png',
'userpfps/Cookie_NH_Villager_Icon.png',
'userpfps/Harvey_NH_Character_Icon.png',
'userpfps/Henry_NH_Villager_Icon.png',
'userpfps/Lolly_NH_Villager_Icon.png',
'userpfps/Mabel_NH_Character_Icon.png',
'userpfps/Marshal_NH_Villager_Icon.png',
'userpfps/Nookling_NH_Character_Icon.png',
'userpfps/Scoot_NH_Villager_Icon.png',
'userpfps/Villager_NH_Character_Icon.png',
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