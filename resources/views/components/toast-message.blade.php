@props(['value' => null, 'key' => 'message'])
@php
    $colorMap = [
        'success' => ' bg-green-300 text-gray-900',
        'error' => 'bg-red-200 text-red-600',
        'info' => ' bg-blue-200 text-gray-900',
        'message' => 'bg-gray-200 text-gray-900',
    ];
    $mainColor = $colorMap[$key];
    $classes =
        'w-full notification relative py-3 text-sm md:text-[16px] rounded-lg my-3 mx-auto  font-bold text-center pl-3 pr-8 ' .
        $mainColor;
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot ?? $value }}
    <x-close-btn />
</div>
