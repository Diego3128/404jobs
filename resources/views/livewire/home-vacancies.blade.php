<div>
    {{-- filter for vacancies --}}
    <livewire:filter-vacancies />

    <div class="pb-12 mb-10">
        <div class="mx-auto max-w-6xl ">
            <h3 class=" text-center text-3xl font-extrabold text-gray-900 mb-10">Our Vacancies</h3>
            <div
                class="vacancy-list grid grid-cols-1 min-[480px]:grid-cols-2 md:grid-cols-3  gap-3 md:gap-5 relative min-h-96 select-text mx-3 md:mx-4">
                @forelse ($vacancies as $vacancy)
                    <div wire:key="{{ $vacancy->id }}"
                        class="space-y-4 border-2 border-gray-300 rounded-lg shadow shadow-gray-300 py-4 px-2.5 relative">
                        <a href="{{ route('vacancies.show', ['vacancy' => $vacancy->id]) }}"
                            class="vacancy-link block border-l-4 border-l-indigo-600 rounded-tl-sm rounded-bl-sm pl-3 bg-indigo-50 text-gray-900 capitalize text-lg truncate">
                            {{ $vacancy->title }}
                        </a>

                        <p class="text-sm text-gray-600 truncate ">
                            <span class="rounded-lg bg-slate-600 text-white  px-1.5 inline-block">At</span>
                            {{ $vacancy->company }}
                        </p>
                        <img src="{{ asset('storage/vacancies/' . $vacancy->image) }}" alt="image {{ $vacancy->title }}"
                            class="w-full h-40 object-cover rounded-sm shadow shadow-gray-300" draggable="false">
                        <p class="text-sm text-gray-600  line-clamp-3 min-[480px]:h-16">
                            {{ $vacancy->description }}</p>

                        <p class="text-sm text-gray-600  truncate">
                            <span class="rounded-lg bg-green-400 text-white  px-1.5 inline-block mr-1">Salary</span>

                            {{ $vacancy->salary->salary }}
                        </p>

                        <p class="text-sm text-gray-600  truncate">
                            <span class="rounded-lg bg-orange-400 text-white  px-1.5 inline-block mr-1">Deadline</span>

                            {{ $vacancy->deadline->isoFormat('D MMMM YYYY') }}
                        </p>

                        <p class="text-sm text-gray-600  truncate">
                            <span class="rounded-lg bg-gray-400 text-white  px-1.5 inline-block mr-1">Created</span>

                            {{ $vacancy->created_at->isoFormat('D MMMM YYYY') }}
                        </p>


                        <a class="block text-center bg-slate-800 rounded-lg p-2 text-gray-200 hover:opacity-85"
                            target="_blank" href="{{ route('vacancies.show', ['vacancy' => $vacancy->id]) }}">Apply</a>

                    </div>
                @empty
                    <div
                        class="absolute h-full w-full border-4 border-dashed border-gray-200 rounded-lg flex items-center justify-center">
                        <p class="text-gray-600 text-lg">No vacancies to show</p>
                    </div>
                @endforelse
            </div>

            <div class="px-5 mt-10">
                {{ $vacancies->links('vendor.livewire.tailwind') }}
            </div>

        </div>

    </div>
</div>
