<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-block px-4 py-2 mt-2 bg-red-800 rounded-md font-semibold text-sm text-white tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
