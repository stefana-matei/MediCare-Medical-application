@props(['href' => 'https://google.com'])

<a href="{{ $href }}" {{ $attributes->merge(['class' => 'inline-block px-4 py-2 mt-2 bg-gray-800 rounded-md font-semibold text-sm text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>
