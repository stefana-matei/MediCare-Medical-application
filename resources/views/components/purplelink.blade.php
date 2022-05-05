@props(['href' => 'https://google.com'])

<a href="{{ $href }}" {{ $attributes->merge(['class' => 'inline-block px-4 py-2 mt-2 bg-purple-800 rounded-md font-semibold text-sm text-white tracking-widest hover:bg-purple-700 active:bg-purple-900 focus:outline-none focus:border-purple-900 focus:ring ring-purple-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>
