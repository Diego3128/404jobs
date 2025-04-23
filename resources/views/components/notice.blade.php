@php
    $classes = 'text-sm text-blue-500 space-y-1 my-5 border-l-4 pl-2 border-l-blue-500 bg-blue-50 py-3';
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
