@php
use App\Models\Category;
$categories = Category::all();
@endphp

<header>
    <div class="sticky top-0 bg-zinc-950 z-50">
        <nav class="max-w-7xl mx-auto flex items-center justify-between p-4">
            <div class="text-white text-2xl font-bold">
                Bloggit
            </div>

            <ul class="flex items-center space-x-6 text-white text-lg font-semibold">
                <li><a href="{{ route('home') }}" class="hover:text-red-400 transition">Inicio</a></li>

                <li class="relative group">
                    <div class="cursor-pointer hover:text-red-400 transition inline-flex items-center">
                        <span>Posts</span>
                        <svg class="ml-1 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 9l-7.5 7.5L4.5 9" />
                        </svg>
                    </div>

                    <ul class="absolute hidden group-hover:flex flex-col bg-zinc-900 text-white py-2 rounded shadow-lg z-50 min-w-[150px] top-full left-0">
                        <li><a href="{{ route('posts.index')}}"
                                class="block px-4 py-2 hover:bg-zinc-800">
                                ver todo
                            </a></li>
                        @foreach ($categories as $category)
                        <li>
                            <a href="{{ route('categories.show', $category->id) }}"
                                class="block px-4 py-2 hover:bg-zinc-800">
                                {{ $category->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>

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