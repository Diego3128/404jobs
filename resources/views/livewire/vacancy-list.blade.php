<div>
    <div
        class="vacancy-list grid grid-cols-1 min-[480px]:grid-cols-2 sm:grid-cols-3  lg:grid-cols-4 gap-3 md:gap-5 relative min-h-96 select-none">
        @forelse ($vacancies as $vacancy)
            <div wire:key="{{ $vacancy->id }}"
                class="space-y-4 border-2 border-gray-300 rounded-lg shadow shadow-gray-300 py-4 px-2.5 relative">

                <button
                    class="copy-btn absolute right-2 top-1 z-10 hover:contrast-150 hover:scale-105 transition-transform"
                    title="copy link">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="size-6 pointer-events-none">
                        <path fill-rule="evenodd"
                            d="M18.97 3.659a2.25 2.25 0 0 0-3.182 0l-10.94 10.94a3.75 3.75 0 1 0 5.304 5.303l7.693-7.693a.75.75 0 0 1 1.06 1.06l-7.693 7.693a5.25 5.25 0 1 1-7.424-7.424l10.939-10.94a3.75 3.75 0 1 1 5.303 5.304L9.097 18.835l-.008.008-.007.007-.002.002-.003.002A2.25 2.25 0 0 1 5.91 15.66l7.81-7.81a.75.75 0 0 1 1.061 1.06l-7.81 7.81a.75.75 0 0 0 1.054 1.068L18.97 6.84a2.25 2.25 0 0 0 0-3.182Z"
                            clip-rule="evenodd" />
                    </svg>
                </button>

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

                <div class="space-y-3">
                    @php
                        $candidateNum = $vacancy->candidates->count();
                        $candidateNum = $candidateNum > 100 ? '+100' : $candidateNum;
                    @endphp
                    <a href="{{ route('candidates.index', ['vacancy' => $vacancy]) }}" draggable="false"
                        class="block p-2 text-sm text-center rounded-lg text-white bg-slate-700 hover:opacity-90 relative">Candidates
                        <span
                            class="absolute -top-2 right-0 bg-slate-700 rounded-lg p-1 text-xs  z-10 min-w-7">{{ $candidateNum }}</span>
                    </a>

                    <a href="{{ route('vacancies.edit', ['vacancy' => $vacancy->id]) }}" draggable="false"
                        class="block p-2 text-sm text-center rounded-lg text-white bg-blue-500 hover:opacity-90">Edit</a>

                    <button wire:click="confirmDelete({{ $vacancy->id }})"
                        class="block w-full p-2 text-sm text-center rounded-lg text-white bg-red-500 hover:opacity-90">Drop
                    </button>
                </div>
            </div>
        @empty
            <div
                class="absolute h-full w-full border-4 border-dashed border-gray-200 rounded-lg flex items-center justify-center">
                <p class="text-gray-600 text-lg">No vacancies to show</p>
            </div>
        @endforelse
    </div>
    <div class="mt-6">
        {{ $vacancies->links('vendor.livewire.tailwind') }}
    </div>
    @if ($showConfirmModal)
        <div wire:click="$set('showConfirmModal', false)"
            class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex justify-center items-center z-50">
            <div class="bg-white p-6 rounded shadow w-full max-w-md" wire:click="$set('showConfirmModal', false)">
                <h2 class="text-lg font-semibold mb-4">Confirm Deletion</h2>
                <p class="mb-4">Are you sure you want to delete this vacancy?</p>
                <div class="flex justify-end gap-2 mt-8">
                    <x-primary-button wire:click="$set('showConfirmModal', false)">Cancel</x-primary-button>

                    <x-primary-button wire:loading.attr="disabled" wire:click="delete"
                        class="bg-red-600 disabled:opacity-30">Delete</x-primary-button>
                </div>
            </div>
        </div>
    @endif
</div>
