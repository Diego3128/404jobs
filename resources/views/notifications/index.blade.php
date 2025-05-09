<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notifications') }}
        </h2>
    </x-slot>

    <div class="py-12 select-none">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-bold  mb-9 text-center border-b-2 border-b-gray-200 pb-3">Latest
                        notifications</h3>

                    @forelse ($notifications as $notification)
                        <div class="sm:flex justify-between border border-gray-200 rounded-lg p-2 mb-2 text-gray-600">
                            <div class="flex-1 overflow-hidden">
                                <p class="line-clamp-1">New candidate for: <span class="font-bold">sdjsdo sodjksod
                                        {{ $notification->data['vacancy_title'] }}</span></p>
                                <p>{{ $notification->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="flex-1 flex items-center justify-end">
                                <a class="bg-slate-800 rounded-lg p-2 text-gray-400 hover:opacity-85" href="#">See
                                    candidates</a>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-700 text-center my-28">You don't have any notifications yet.</p>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
