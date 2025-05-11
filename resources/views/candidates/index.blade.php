<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Candidates for ' . $vacancy->title) }}
        </h2>
    </x-slot>

    <div class="py-12 select-none">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-bold  mb-9 text-center border-b-2 border-b-gray-200 pb-3">Latest
                        candidates</h3>

                    <ul class="relative min-h-96 space-y-3">
                        @forelse ($vacancy->candidates as $candidate)
                            <li
                                class="text-sm  sm:text-base border border-gray-300 py-2 px-1 md:px-3 rounded-lg select-text md:w-8/12 mx-auto relative overflow-x-auto">
                                {{-- candidate info --}}
                                <div class="flex gap-1 items-center ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-4 md:size-5 flex-shrink-0">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>

                                    <p class="line-clamp-1 text-gray-800">{{ $candidate->user->name }}
                                    </p>
                                </div>
                                <div class="flex gap-1 items-center ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-4 md:size-5 flex-shrink-0">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                    </svg>

                                    <p class="text-gray-800">{{ $candidate->user->email }}
                                    </p>
                                </div>
                                <div class="flex gap-1 items-center ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-4 md:size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>


                                    <p class="line-clamp-1 text-gray-800">
                                        {{ $candidate->created_at->diffForHumans() }}
                                    </p>
                                </div>
                                {{-- download cv button --}}
                                <div
                                    class= "mt-2 sm:mt-0 sm:absolute  sm:top-0 sm:right-4 sm:bottom-0 sm:flex sm:items-center sm:justify-center select-none">
                                    <a target="__blank" rel="noreferrer noopener" draggable="false"
                                        href="{{ asset('storage/candidate_cv/' . $candidate->cv_path) }}"
                                        class="flex items-center gap-2 rounded-lg p-2 bg-slate-800 text-white w-fit">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="size-4 md:size-5 flex-shrink-0">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m.75 12 3 3m0 0 3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                        </svg>

                                        <span class="hidden sm:inline">cv</span>
                                    </a>
                                </div>

                            </li>
                        @empty
                            <div
                                class="absolute h-full w-full border-4 border-dashed border-gray-200 rounded-lg flex items-center justify-center">
                                <p class="text-gray-600 text-lg">No candidates to show</p>
                            </div>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
