<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm focus:outline-none transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>