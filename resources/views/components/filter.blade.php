<div>
    <form method="GET" class="mb-6">
    <label for="sort" class="text-white mr-2">Ordenar por:</label>
    <select name="sort" id="sort" onchange="this.form.submit()"
        class="bg-zinc-800 border border-zinc-700 text-white rounded px-3 py-2">
        <option value="latest" {{ request('sort') === 'latest' ? 'selected' : '' }}>Más recientes</option>
        <option value="views" {{ request('sort') === 'views' ? 'selected' : '' }}>Más vistos</option>
        <option value="comments" {{ request('sort') === 'comments' ? 'selected' : '' }}>Más comentados</option>
        <option value="rating" {{ request('sort') === 'rating' ? 'selected' : '' }}>Mejor valorados</option>
        <option value="random" {{ request('sort') === 'random' ? 'selected' : '' }}>Ordenar al azar</option>
    </select>
    </form>
</div>