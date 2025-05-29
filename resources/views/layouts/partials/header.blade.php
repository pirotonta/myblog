<header>
    <div class="sticky top-0 bg-zinc-950 z-50 h-20">
        <nav class="max-w-7xl mx-auto flex items-center justify-between p-4">
            <div class="flex items-center space-x-12">
                <div class="text-white text-4xl font-bold">
                    Bloggit
                </div>

                <ul class="flex space-x-8 text-white text-lg font-semibold ml-15">
                    <li><a href="{{ route('home') }}" class="hover:text-red-400 transition">Inicio</a></li>
                    <li><a href="{{ route('posts.index') }}" class="hover:text-red-400 transition">Posts</a></li>
                </ul>
            </div>

            <ul class="flex items-center space-x-4">
                @if (Route::has('login'))
                @auth
                <li>
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-lg font-semibold rounded-md text-white hover:text-red-400 transition focus:outline-none">
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
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                        Iniciar sesión
                    </a>
                </li>
                @if (Route::has('register'))
                <li>
                    <a href="{{ route('register') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                        Crear cuenta
                    </a>
                </li>
                @endif
                @endauth
                @endif
            </ul>
        </nav>
        @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
        @endif
    </div>
</header>