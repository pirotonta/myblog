@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge([
    'class' => 'p-1.5 border-gray-300 border-gray-700 text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm'
]) }}>