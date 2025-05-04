<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit vacancy') }}
        </h2>
    </x-slot>

    <div class="py-12 select-none">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-bold  mb-9 text-center border-b-2 border-b-gray-200 pb-3">Job offer details
                    </h3>
                    <div>
                        <livewire:edit-vacancy :vacancy="$vacancy" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
