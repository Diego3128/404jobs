<div>
    <h3 class="text-xl font-bold text-center mb-4">{{ $vacancy->title }}</h3>

    <div
        class="space-y-4 md:space-y-0  border bg-gray-50 border-gray-100 rounded-lg px-3 py-4 md:grid md:grid-cols-2 gap-3">

        <div class="font-medium text-sm md:text-lg text-gray-600 flex justify-start gap-2">
            <p class="font-bold">Company:</p>
            <p class="text-gray-700">{{ $vacancy->company }}</p>
        </div>

        <div class="font-medium text-sm md:text-lg text-gray-600 flex justify-start gap-2">
            <p class="font-bold">Last day to apply:</p>
            <p class="text-gray-700">{{ $vacancy->deadline->isoFormat('MMMM D YYYY') }}</p>
        </div>

        <div class="font-medium text-sm md:text-lg text-gray-600 flex justify-start gap-2">
            <p class="font-bold">Category:</p>
            <p class="text-gray-700">{{ $vacancy->category->category }}</p>
        </div>

        <div class="font-medium text-sm md:text-lg text-gray-600 flex justify-start gap-2">
            <p class="font-bold">Salary:</p>
            <p class="text-gray-700">{{ $vacancy->salary->salary }}</p>
        </div>

    </div>

    <div
        class="mt-8 space-y-12 md:space-y-0  border bg-gray-50 border-gray-100 rounded-lg px-3 py-4 md:grid md:grid-cols-6 gap-4">
        <div class="md:col-span-4 text-sm md:text-lg text-gray-600">
            <h2 class="font-bold">Description</h2>
            <p>{{ $vacancy->description }}</p>
        </div>

        <div class="md:col-span-2">
            <img draggable="false" class="rounded-lg " src="{{ asset('storage/vacancies/' . $vacancy->image) }}"
                alt="vacancy {{ $vacancy->title }} image">
        </div>
    </div>

    @guest
        <div class="mt-8  border bg-gray-50 border-gray-100 rounded-lg px-3 py-4">

            <p class="text-center md:text-lg text-gray-700 text-pretty">Would you like to apply for this job?
                <a class="text-indigo-500" href="{{ route('login') }}">log
                    in</a> or
                <a class="text-indigo-500" href="{{ route('register') }}">register here</a>.
            </p>
        </div>
    @endguest

    {{-- form to apply for a vacancy (only for devs) --}}

    @cannot('create', \App\Models\Vacancy::class)
        <livewire:apply-for-vacancy :vacancy="$vacancy" />
    @endcannot

</div>
