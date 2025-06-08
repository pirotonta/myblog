@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge([
    'class' => 'p-1.5 bg-zinc-800 border border-zinc-600 px-4 w-96 text-gray-300 rounded-md shadow-sm'
]) }}>