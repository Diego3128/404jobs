<x-guest-layout>
    <x-notice>
        <p>{{ __('Before getting started, you need to verify your email address by clicking on the link we just emailed to you.') }}
        </p>
    </x-notice>

    <x-notice>
        <p>
            {{ __('If you didn\'t receive the email, request another one.') }}
        </p>
    </x-notice>

    @if (session('status') == 'verification-link-sent')
        <x-notice class="text-green-600 bg-green-100 border-l-green-500">
            <p>{{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </p>
        </x-notice>
    @endif

    <div class="mt-4 space-y-6">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <div>
                <x-primary-button class="w-full justify-center my-3 py-4 bg-blue-500">
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            </button>

            <x-primary-button class="justify-center bg-gray-400 text-gray-900">
                {{ __('Log Out') }}
            </x-primary-button>
        </form>
    </div>
</x-guest-layout>
