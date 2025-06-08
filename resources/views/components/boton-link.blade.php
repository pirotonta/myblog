@props(['href'])

<a href="{{ $href }}"
    {{ $attributes->merge(['class' => 'justify-center inline-block px-5 py-1.5 border border-gray-600 font-medium text-base text-white rounded-sm hover:border-red-400 transition']) }}>
    {{ $slot }}
</a>