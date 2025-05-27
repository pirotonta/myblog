<header>
    <div class="sticky top-0 bg-zinc-950 z-50">
        <nav class="max-w-7xl mx-auto flex items-center justify-between p-4">
            <div class="text-white text-2xl font-bold">
                Bloggit
            </div>

            <ul class="flex items-center space-x-6 text-white text-lg font-semibold">
                <li><a href="{{ route('home') }}" class="hover:text-red-400 transition">Inicio</a></li>
                <li><a href="{{ route('posts.index') }}" class="hover:text-red-400 transition">Posts</a></li>
                <li><a href="#" class="hover:text-red-400 transition">mas</a></li>
                <li><a href="#" class="hover:text-red-400 transition">mas</a></li>

                <li>
                    <a href="/login" class="flex items-center gap-2 hover:text-red-400 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a8.25 8.25 0 0115 0" />
                        </svg>
                        Iniciar sesión
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</header>