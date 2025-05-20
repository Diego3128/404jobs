<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Candidates for ' . $vacancy->title) }}
        </h2>
    </x-slot> --}}

    <div class="h-[90dvh] py-20  select-none bg-gradient-to-r from-neutral-300 to-stone-400">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="p-3">

                <h3 class="text-4xl sm:text-6xl font-extrabold  mb-9 text-center text-indigo-700 text-pretty">
                    Find a Tech Job
                    remotely</h3>

                <p class="text-center text-balance text-gray-800 sm:text-lg">Find your dream job, totally remote. There
                    are many
                    local and international companies looking for a
                    passionate developer. Fronted, Backend, Devops and much more!</p>
            </div>
        </div>
    </div>

    {{-- filter for vacancies --}}

    <livewire:home-vacancies />

</x-app-layout>
