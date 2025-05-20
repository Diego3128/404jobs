<div class="bg-gray-100 py-10">
    <h2 class="text-2xl md:text-3xl text-gray-900 text-center font-extrabold my-5">Search and filter vacancies</h2>

    <div class="max-w-5xl mx-auto p-4">
        <form wire:submit.prevent="readFilters">
            <div class="sm:grid sm:grid-cols-3 gap-5">
                <div class="mb-5">
                    <label class="block mb-1 text-sm text-gray-700 uppercase font-bold " for="term">Search term
                    </label>
                    <input wire:model="searchterm" id="term" type="text" placeholder="E.g: Laravel"
                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full" />
                </div>

                <div class="mb-5">
                    <label for="category" class="block mb-1 text-sm text-gray-700 uppercase font-bold">Category</label>
                    <select id="category" wire:model="category" class="border-gray-300 p-2 w-full">
                        <option value="">--Choose one--</option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-5">
                    <label for="salary" class="block mb-1 text-sm text-gray-700 uppercase font-bold">Monthly
                        salary</label>
                    <select id="salary" wire:model="salary" class="border-gray-300 p-2 w-full">
                        <option value="">-- Choose one --</option>
                        @foreach ($salaries as $salary)
                            <option value="{{ $salary->id }}">{{ $salary->salary }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex justify-end">
                <button class="block text-center bg-slate-800 rounded-lg p-2 text-gray-200 hover:opacity-85"
                    type="submit">Search</button>
            </div>
        </form>
    </div>
</div>
