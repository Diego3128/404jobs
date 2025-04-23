@props(['disabled' => false])

<input @disabled($disabled)
    {{ $attributes->merge(['class' => 'border-blue-100 focus:border-blue-200 focus:ring-blue-200 rounded-md shadow-sm']) }}>
