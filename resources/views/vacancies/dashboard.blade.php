<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage you vacancies here') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-notifications />

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <livewire:vacancy-list />
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        @vite('resources/js/dashboard.js')
    @endpush
</x-app-layout>
