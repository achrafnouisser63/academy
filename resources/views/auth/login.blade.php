<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }};"/>

    <form method="POST" action="{{ route('login') }}" class="bg-gray-100 p-10 rounded-xl shadow-md max-w-lg mx-auto mt-12" style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }};">
        @csrf


        <!-- Logo -->
        <div class="flex justify-center mb-6  border border-white">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-9 h-10" style="margin-top: 10px; width: 60%;">
        </div>

        <h2 class="text-4xl font-semibold text-center mb-10 text-gray-900">{{ __('auth.login') }}</h2>

        <!-- Email Address -->
        <div class="mb-6">
            <x-input-label for="email" :value="__('auth.email')" class="text-right text-gray-800 text-xl mb-4" />
            <x-text-input id="email"
                class="block w-full text-right px-4 py-3 rounded-xl border border-gray-400 focus:border-green-500 focus:ring-2 focus:ring-green-300 transition duration-300"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
                placeholder="{{ __('auth.email_placeholder') }}" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-700" />
        </div>

        <!-- Password -->
        <div class="mb-6">
            <x-input-label for="password" :value="__('auth.password')" class="text-right text-gray-800 text-xl mb-2" />
            <x-text-input id="password"
                class="block w-full text-right px-4 py-3 rounded-xl border border-gray-400 focus:border-green-500 focus:ring-2 focus:ring-green-300 transition duration-300"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                placeholder="{{ __('auth.password_placeholder') }}"/>
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-700" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center mb-6 pl-4 pr-4">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox" class="rounded  border-gray-400 text-green-600 shadow-sm focus:ring-green-500 w-5 h-5" name="remember">
                <span class="text-gray-700 ml-2  pl-4 pr-4 ">{{ __('auth.remember_me') }}</span>
            </label>
        </div>

        <div class="flex flex-col space-y-4">
            <x-primary-button class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-4 px-7 rounded-xl transition duration-300 text-xl mx-auto block text-center">
                {{ __('auth.login_button') }}
            </x-primary-button>

            <div class="flex justify-between text-base">

                <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800 transition duration-300 mb-4 mt-4 mr-4">
                    {{ __('auth.register') }}
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>
