<header class="sticky top-0 bg-zinc-950 z-50 h-16 flex items-center">
    <nav class="w-full max-w-7xl mx-auto flex justify-between items-center px-4">

        <div class="flex items-center space-x-12">
            {{-- Logo --}}
            <a href="{{ route('home') }}">
                <div class="flex items-center text-white text-3xl font-bold">
                    <img class="w-8 mr-2" src="/icons/forum-icon.svg" alt="icono-foro" />
                    <span class="hover:text-red-400 transition">Bloggit</span>
                </div>
            </a>

            <ul class="flex items-center ml-10 space-x-10 text-white text-lg font-semibold">
                <li class="relative group">
                    <div class="cursor-pointer hover:text-red-400 transition inline-flex items-center">
                        <span>Temas</span>
                        <img class="w-4 ml-1 relative top-[2px]" src="/icons/chevron-down.png" alt="chevron icon" />
                    </div>
                    <ul class="absolute hidden group-hover:flex flex-col bg-zinc-900 text-white py-2 rounded z-50 min-w-[150px] top-full left-0 text-sm">
                        @foreach ($categories as $category)
                        <li>
                            <a href="{{ route('categories.show', $category->id) }}" class="block px-4 py-2 hover:bg-zinc-800">
                                {{ $category->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <a href="{{ route('posts.create') }}" class="hover:text-red-400 transition">
                        <div class="cursor-pointer hover:text-red-400 transition inline-flex items-center">
                            Crear post +
                        </div>
                    </a>
                </li>
            </ul>
        </div>

        {{-- Search input --}}

        <div x-data="liveSearch()" @click.away="open = false" class="relative">
            <input
                type="text"
                placeholder="Buscar posts o usuarios..."
                class="p-1.5 bg-zinc-900 px-4 border border-gray-700 text-gray-300 w-96 rounded-md shadow-sm"
                @input.debounce.300ms="fetchResults"
                x-model="query"
                @focus="open = true" />

            <div x-show="open && query.length > 0" class="absolute mt-1 bg-zinc-800 w-full z-50 rounded shadow">
                <template x-if="results.length === 0">
                    <div class="p-2 text-gray-400">No hay resultados</div>
                </template>
                <!-- posts -->
                <template x-if="results.filter(r => r.type === 'post').length > 0">
                    <div>
                        <div class="mt-2 px-4 py-1 text-xs uppercase tracking-wide text-gray-400">Posts</div>
                        <template x-for="item in results.filter(r => r.type === 'post')" :key="item.id">
                            <a :href="item.url" class="block px-4 py-2 hover:bg-zinc-700 text-white transition"
                                x-text="item.label"></a>
                        </template>
                    </div>
                </template>
                <!-- usuarios -->
                <template x-if="results.filter(r => r.type === 'user').length > 0">
                    <div>
                        <div class="px-4 py-1 text-xs uppercase tracking-wide text-gray-400">Usuarios</div>
                        <template x-for="item in results.filter(r => r.type === 'user')" :key="item.id">
                            <a :href="item.url" class="block px-4 py-2 hover:bg-zinc-700 text-white transition"
                                x-text="item.label"></a>
                        </template>
                    </div>
                </template>
            </div>
        </div>


        {{-- User menu --}}

        <ul class="flex items-center space-x-4">
            @if (Route::has('login'))
            @auth
            <li>
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open"
                        class="inline-flex items-center px-4 py-2 text-white text-lg font-semibold hover:text-red-400 transition focus:outline-none cursor-pointer">
                        <img src="{{ Auth::user()->profile_picture }}" class="w-8 h-8 rounded-full mr-2" /> {{ Auth::user()->username }}
                        <img class="w-4 ml-1 relative top-[2px]" src="/icons/chevron-down.png" alt="chevron icon" />
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

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('liveSearch', () => ({
            query: '',
            results: [],
            open: false,

            async fetchResults() {
                if (this.query.length === 0) {
                    this.results = [];
                    return;
                }

                const res = await fetch(`/search?q=${encodeURIComponent(this.query)}`);
                const data = await res.json();

                this.results = [];

                data.posts.forEach(post => {
                    this.results.push({
                        id: post.id,
                        type: 'post',
                        label: `${post.title}`,
                        url: `/posts/${post.id}`
                    });
                });

                data.users.forEach(user => {
                    this.results.push({
                        id: user.id + '-user',
                        type: 'user',
                        label: `${user.username}`,
                        url: `/profile/${user.username}`
                    });
                });

                this.open = true;
            }
        }));
    });
</script>