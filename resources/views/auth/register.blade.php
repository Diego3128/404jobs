<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" novalidate>
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!--Role -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Choose your role')" />
            <select name="role" id="role"
                class="border-blue-100 focus:border-blue-200 focus:ring-blue-200 rounded-md shadow-sm w-full">
                <option value="" selected>Choose a rol</option>
                <option value="1" {{ @old('role') === '1' ? 'selected' : '' }}>Recruiter - Post jobs</option>
                <option value="2" {{ @old('role') === '2' ? 'selected' : '' }}>Developer - Search for jobs</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <x-primary-button class="w-full justify-center my-7 py-4 bg-blue-500">
            {{ __('Register') }}
        </x-primary-button>

        <div class="flex items-center justify-start mb-4">
            <x-link href="{{ route('login') }}" :contents="__('Already registered?')" />
        </div>

    </form>
</x-guest-layout>
