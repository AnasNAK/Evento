@props(['active'])

@php
$classes = ($active ?? false)
            ? 'font-bold border border-blue-500 px-4 py-2 rounded-full'
            : 'font-bold border border-2 border-black px-4 py-2 rounded-lg rounded-full ';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
