<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => '
        w-full
        px-4 py-2
        bg-transparent
        border border-zinc-700
        text-gray-300
        rounded-md
        hover:bg-zinc-800
        hover:text-white
        transition ease-in-out duration-150
    ']) }}>
    {{ $slot }}
</button>