<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input.label for="email" :value="__('Email')" />
            <x-input.text id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required
                autofocus />
            <x-input.error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input.label for="password" :value="__('Password')" />

            <x-input.text id="password" class="block w-full mt-1" type="password" name="password" required
                autocomplete="current-password" />

            <x-input.error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="text-yellow-600 border-gray-300 rounded shadow-sm focus:ring-yellow-500 dark:border-gray-700 dark:bg-gray-900 dark:focus:ring-yellow-600 dark:focus:ring-offset-gray-800"
                    name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-button.primary class="ml-3">
                {{ __('Log in') }}
            </x-button.primary>
        </div>
    </form>
</x-guest-layout>
