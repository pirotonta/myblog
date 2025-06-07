@if ($paginator->hasPages())
<nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between mt-4">
    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
        <div>
            <p class="text-sm text-gray-400 leading-5">
                Mostrando
                @if ($paginator->firstItem())
                <span class="font-medium text-white">{{ $paginator->firstItem() }}</span>-<span class="font-medium text-white">{{ $paginator->lastItem() }}</span>
                @else
                {{ $paginator->count()}}
                @endif
                de
                <span class="font-medium text-white">{{ $paginator->total() }}</span>
                resultados
            </p>
        </div>

        <div>
            <span class="inline-flex space-x-1 rtl:space-x-reverse">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                <span class="relative inline-flex items-center px-3 py-2 mx-1 text-sm font-medium text-gray-500 border border-gray-600 rounded-md cursor-default bg-zinc-950">
                    «
                </span>
                @else
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="relative inline-flex items-center px-3 py-2 mx-1 text-sm font-medium text-white border rounded-md border-gray-600 hover:border-red-400 transition duration-150"
                    aria-label="{{ __('pagination.previous') }}">
                    «
                </a>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                <span class="relative inline-flex items-center px-4 py-2 mx-1 text-sm font-medium text-gray-400 border border-gray-600 rounded-md bg-gray-800">
                    {{ $element }}
                </span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                <span aria-current="page">
                    <span class="relative inline-flex items-center px-4 py-2 mx-1 text-sm font-medium text-gray-400 border border-gray-600 rounded-md bg-zinc-950">
                        {{ $page }}
                    </span>
                </span>
                @else
                <a href="{{ $url }}"
                    class="relative inline-flex items-center px-4 py-2 mx-1 text-sm font-medium text-gray-200 border border-gray-600 hover:border-red-400 rounded-md transition duration-150"
                    aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                    {{ $page }}
                </a>
                @endif
                @endforeach
                @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="relative inline-flex items-center px-3 py-2 mx-1 text-sm font-medium text-white border rounded-md border-gray-600 hover:border-red-400 transition duration-150"
                    aria-label="{{ __('pagination.next') }}">
                    »
                </a>
                @else
                <span class="relative inline-flex items-center px-3 py-2 mx-1 text-sm font-medium text-gray-500 border border-gray-600 rounded-md cursor-default bg-zinc-950">
                    »
                </span>
                @endif
            </span>
        </div>
    </div>
</nav>
@endif