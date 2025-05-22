<x-app-layout>

    <div class="h-[90dvh] py-20  select-none bg-gradient-to-r from-neutral-300 to-stone-400 relative group">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="p-3 z-10 relative">
                <h3 class="text-4xl sm:text-6xl font-extrabold  mb-32 text-center text-indigo-700 text-pretty">
                    Fetch a Tech Job
                    <span class="animate-shake bg-indigo-700 inline-block p-3 rounded-lg text-white">Remotely</span>
                </h3>

                <p
                    class="text-center text-balance text-gray-300 sm:text-lg p-5 rounded-lg bg-slate-900  opacity-70 group-hover:opacity-100 transition-opacity  duration-500">
                    There
                    are many
                    local and international companies looking for a
                    passionate developer. Fronted, Backend, Devops and much more!</p>
            </div>
        </div>

        @include('home._partials.carousel')
    </div>

    {{-- filter for vacancies --}}
    <livewire:home-vacancies />


    @include('home._partials.footer')


</x-app-layout>
