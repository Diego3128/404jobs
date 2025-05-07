<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Job offer details') }}
        </h2>
    </x-slot>

    <div class="py-12 select-none">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <x-notifications />

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <livewire:show-vacancy :vacancy="$vacancy" />
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        @vite('resources/js/dashboard.js')
    @endpush
</x-app-layout>
