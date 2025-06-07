@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge([
    'class' => 'p-1.5 bg-zinc-900 px-4 border-gray-300 w-96 border-gray-700 text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm'
]) }}>