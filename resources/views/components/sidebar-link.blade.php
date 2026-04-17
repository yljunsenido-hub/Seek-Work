@props(['href', 'active' => false])

@php
// This logic checks if the current URL matches the link to highlight it
$isSelected = request()->is(ltrim($href, '/')) || request()->fullUrlIs($href);

$classes = ($isSelected)
            ? 'block px-4 py-2 rounded-md bg-blue-600 text-white font-semibold transition'
            : 'block px-4 py-2 rounded-md text-gray-300 hover:bg-slate-700 hover:text-white transition';
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>