@props(['contents' => null])

@php
    $classes =
        'underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-inherit inline-block';
@endphp
<div>
    @if ($contents)
        <a {{ $attributes->merge(['class' => $classes]) }}">
            {{ $contents }}
        </a>
    @endif
</div>
