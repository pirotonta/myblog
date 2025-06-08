<div>
    <form method="GET" class="mb-6">
        <label for="sort" class="text-white mr-2">Ordenar por:</label>
        <div class="relative inline-block">
            <select name="sort" id="sort" onchange="this.form.submit()"
                class="appearance-none bg-zinc-800 border border-zinc-600 text-white rounded px-2 py-2 pr-10 cursor-pointer hover:border-red-400">
                <option value="latest" {{ request('sort') === 'latest' ? 'selected' : '' }}>Más recientes</option>
                <option value="views" {{ request('sort') === 'views' ? 'selected' : '' }}>Más vistos</option>
                <option value="comments" {{ request('sort') === 'comments' ? 'selected' : '' }}>Más comentados</option>
                <option value="rating" {{ request('sort') === 'rating' ? 'selected' : '' }}>Mejor valorados</option>
                <option value="random" {{ request('sort') === 'random' ? 'selected' : '' }}>Ordenar al azar</option>
            </select>
            <img src="/icons/chevron-down.png" alt="chevron icon"
                class="w-4 h-4 absolute left-35 top-1/2 transform -translate-y-1/2 pointer-events-none" />
        </div>
    </form>
</div>