<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => '
        w-full
        px-4 py-2
        bg-transparent
        border border-gray-600
        text-white
        hover:border-red-400
        rounded-md
        transition ease-in-out duration-150
    ']) }}>
    {{ $slot }}
</button>