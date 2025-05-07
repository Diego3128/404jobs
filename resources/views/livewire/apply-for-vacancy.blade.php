<div class="mt-10">
    <h3 class="text-xl text-gray-700 text-center">Apply for this job</h3>

    <form wire:submit.prevent="createCandidate" class="flex flex-col gap-6 mt-6 items-start" novalidate>

        <x-input-label for="cv" :value="__('Upload your CV')" />

        <input id="cv" type="file" accept=".pdf" wire:model.live="cv">

        <x-input-error :messages="$errors->get('cv')" class="mt-2" />

        <x-primary-button wire:loading.attr="disabled" type="submit" class="disabled:opacity-50">
            <span wire:loading.remove wire:target="createCandidate">Send</span>
            <span wire:loading wire:target="createCandidate">Sending</span>
        </x-primary-button>
    </form>
</div>
