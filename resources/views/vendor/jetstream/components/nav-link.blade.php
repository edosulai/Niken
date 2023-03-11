@props(['active'])

@php
$classes = ($active ?? false)
            ? 'nav-item active font-weight-bolder'
            : 'nav-item';
@endphp

<li {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</li>
