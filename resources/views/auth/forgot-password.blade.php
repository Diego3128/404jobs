<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        <x-notice>
            <p>{{ __('If you have forgotten your password you can use your email address to create a new one.') }}</p>
        </x-notice>

        <x-notice>
            <p>{{ __('Enter your email address to generate a password reset link that will allow you to choose a new password.') }}
            </p>
        </x-notice>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" novalidate>
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <x-primary-button class="w-full justify-center my-7 py-4 bg-blue-500">
            {{ __('Email Password Reset Link') }}
        </x-primary-button>

        <div class="flex items-center justify-between my-4 gap-4">
            <x-link :href="route('login')" :contents="__('Login')" class="text-center" />
            <x-link :href="route('register')" :contents="__('Create a new account')" class="text-center" />
        </div>

    </form>
</x-guest-layout>
