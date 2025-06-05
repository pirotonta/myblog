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

<form method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('PATCH')

    <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Elegir avatar</h2>

    <div class="flex flex-wrap gap-4">
        @foreach ($avatars as $avatar)
            <label class="cursor-pointer">
                <input
                    type="radio"
                    name="profile_picture"
                    value="{{ $avatar }}"
                    class="sr-only"
                    @if (auth()->user()->profile_picture === $avatar) checked @endif
                >
                <img
                    src="{{ asset($avatar) }}"
                    class="w-16 h-16 rounded-full border-4 transition
                        @if(auth()->user()->profile_picture === $avatar)
                            border-blue-500
                        @else
                            border-transparent hover:border-blue-300
                        @endif"
                >
            </label>
        @endforeach
    </div>

    <button type="submit"
        class="mt-4 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition">
        Guardar avatar
    </button>
</form>