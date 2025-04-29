<div {{ $attributes->merge(['class' => 'dashboard-notifications mx-auto px-3 md:px-0 max-w-xl']) }}>
    @foreach (['success', 'error', 'info', 'message'] as $message)
        @if (session()->has($message))
            <x-toast-message :key="$message">
                {{ session($message) }}
            </x-toast-message>
        @endif
    @endforeach
</div>
