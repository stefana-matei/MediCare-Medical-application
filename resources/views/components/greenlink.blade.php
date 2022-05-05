@props(['href' => 'https://google.com'])

<a href="{{ $href }}" {{ $attributes->merge(['class' => 'inline-block px-4 py-2 mt-2 bg-green-800 rounded-md font-semibold text-sm text-white tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>
