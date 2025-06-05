@php
use App\Models\Category;
$categories = Category::all();
@endphp

<header class="sticky top-0 bg-zinc-950 z-50 h-16 flex items-center">
    <nav class="w-full max-w-7xl mx-auto flex justify-between items-center px-4">

        <div class="flex items-center space-x-12">
            {{-- Logo --}}
            <a href="{{ route('home') }}">
                <div class="flex items-center text-white text-3xl font-bold">
                    <img class="w-8 mr-2" src="./images/forum-icon.svg" alt="icono-github" />
                    <span class="hover:text-red-400 transition">Bloggit</span>
                </div>
            </a>

            <ul class="flex items-center ml-10 space-x-10 text-white text-lg font-semibold">
                <li class="relative group">
                    <div class="cursor-pointer hover:text-red-400 transition inline-flex items-center">
                        <span>Temas</span>
                        <img class="w-4 ml-1 relative top-[2px]" src="./images/chevron-down.png" alt="chevron icon" />
                    </div>
                    <ul class="absolute hidden group-hover:flex flex-col bg-zinc-900 text-white py-2 rounded z-50 min-w-[150px] top-full left-0 text-sm">
                        <li>
                            <a href="{{ route('posts.index') }}" class="block px-4 py-2 hover:bg-zinc-800">
                                Ver todo
                            </a>
                        </li>
                        @foreach ($categories as $category)
                        <li>
                            <a href="{{ route('categories.show', $category->id) }}" class="block px-4 py-2 hover:bg-zinc-800">
                                {{ $category->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>

        <ul class="flex items-center space-x-4">
            @if (Route::has('login'))
            @auth
            <li>
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open"
                        class="inline-flex items-center px-4 py-2 text-white text-lg font-semibold hover:text-red-400 transition focus:outline-none">
                        {{ Auth::user()->name }}
                        <svg class="ms-2 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>

                    <div x-show="open" x-transition @click.away="open = false"
                        class="absolute right-0 mt-2 w-48 bg-zinc-800 rounded-md shadow-lg py-1 z-50"
                        x-cloak>
                        <a href="{{ route('profile.edit') }}"
                            class="block px-4 py-2 text-sm text-white hover:bg-zinc-700 transition">
                            Editar perfil
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full text-left px-4 py-2 text-sm text-white hover:bg-zinc-700 transition">
                                Cerrar sesión
                            </button>
                        </form>
                    </div>
                </div>
            </li>
            @else
            <li>
                <a href="{{ route('login') }}"
                    class="inline-block px-5 py-1.5 border border-gray-600 text-sm text-white rounded-sm hover:border-red-400 transition">
                    Iniciar sesión
                </a>
            </li>
            @if (Route::has('register'))
            <li>
                <a href="{{ route('register') }}"
                    class="inline-block px-5 py-1.5 border border-gray-600 text-sm text-white rounded-sm hover:border-red-400 transition">
                    Crear cuenta
                </a>
            </li>
            @endif
            @endauth
            @endif
        </ul>
    </nav>
</header>