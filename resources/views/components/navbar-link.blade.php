@props(['href'])

<a href="{{ $href }}"
    {{ $attributes->merge(['class' => 'hover:text-red-400 transition font-medium text-base cursor-pointer']) }}>
    {{ $slot }}
</a>