<form
    class="max-w-2xl mx-auto border-2 border-gray-200 rounded-lg py-9 px-3 md:px-6 space-y-5 shadow-lg shadow-gray-200 mb-14"
    method="POST" action="" novalidate enctype="multipart/form-data" wire:submit.prevent="updateVacancy">
    <div>
        <x-input-label for="title" :value="__('Job offer')" />
        <x-text-input id="title" class="block mt-1 w-full" type="text" wire:model.difer="title" autocomplete="title"
            placeholder="E.g: Web designer" />
        @error('title')
            <livewire:warning-alert :messages="$errors->get('title')" />
        @enderror
    </div>

    <div>
        <x-input-label for="salary" :value="__('Monthly salary')" />
        <select wire:model.difer="salary" id="salary"
            class="border-blue-100 focus:border-blue-200 focus:ring-blue-200 rounded-md shadow-sm w-full">
            <option value="" selected>Choose a range</option>
            @foreach ($salaryRanges as $salaryR)
                <option value="{{ $salaryR->id }}">{{ $salaryR->salary }}</option>
            @endforeach
        </select>
        @error('salary')
            <livewire:warning-alert :messages="$errors->get('salary')" />
        @enderror
    </div>

    <div>
        <x-input-label for="category" :value="__('Category')" />
        <select wire:model.difer="category" id="category"
            class="border-blue-100 focus:border-blue-200 focus:ring-blue-200 rounded-md shadow-sm w-full">
            <option value="" selected>Choose a range</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category }}</option>
            @endforeach
        </select>
        @error('category')
            <livewire:warning-alert :messages="$errors->get('category')" />
        @enderror
    </div>

    <div>
        <x-input-label for="company" :value="__('Company')" />
        <x-text-input id="company" class="block mt-1 w-full" type="text" wire:model.difer="company"
            autocomplete="company" placeholder="E.g: Amazon." />
        @error('company')
            <livewire:warning-alert :messages="$errors->get('company')" />
        @enderror
    </div>

    <div>
        <x-input-label for="deadline" :value="__('Last day to apply')" />
        <input class="border-blue-100 focus:border-blue-200 focus:ring-blue-200 rounded-md shadow-sm w-full"
            type="date" wire:model.difer="deadline" id="deadline">
        @error('deadline')
            <livewire:warning-alert :messages="$errors->get('deadline')" />
        @enderror
    </div>

    <div>
        <x-input-label for="description" :value="__('Job description')" />
        <textarea
            class="border-blue-100 focus:border-blue-200 focus:ring-blue-200 rounded-md shadow-sm w-full min-h-60 max-h-96"
            wire:model.difer="description" id="description"></textarea>
        @error('description')
            <livewire:warning-alert :messages="$errors->get('description')" />
        @enderror
    </div>

    {{-- prev image --}}
    <div>
        <x-input-label :value="__('Current image')" />
        <img src="{{ asset('storage/vacancies/' . $image) }}" alt="image {{ $title }}"
            class="w-10/12 max-w-md mx-auto my-5" draggable="false">
    </div>

    <div>
        <x-input-label for="new_image" :value="__('New Image')" />
        <input id="new-image" type="file" wire:model.live="new_image" accept="image/*"
            class="border-2  p-4 focus:bg-blue-100 focus:outline-none hover:bg-blue-100 border-blue-100 focus:border-blue-200 focus:ring-blue-200 rounded-md shadow-sm w-full" />

        <x-input-error :messages="$errors->get('new_image')"
            class="!text-inherit text-sm md:text-[16px] text-gray-800  border-l-yellow-500 bg-yellow-200 py-1.5" />

        @if ($new_image)
            <img src="{{ $new_image->temporaryUrl() }}" alt="preview" class="w-10/12 max-w-md mx-auto my-5 mb-8"
                draggable="false">
        @endif
    </div>

    <x-primary-button wire:loading.attr="disabled" wire:target="updateVacancy" class="py-4 disabled:opacity-30">
        <span wire:loading.remove wire:target="updateVacancy">Update Vacancy</span>
        <span wire:loading wire:target="updateVacancy">Updating...</span>
    </x-primary-button>
</form>
