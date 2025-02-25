<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="bg-gray-100 p-12 rounded-2xl shadow-xl max-w-xl mx-auto mt-16" style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }};">
        @csrf

        <!-- Logo -->
        <div class="flex justify-center mb-8">
            <a href="{{ url('/') }}" class="flex justify-center">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-9 h-10" style="margin-top: 10px; width: 60%;">
            </a>
        </div>

        <h2 class="text-3xl font-bold text-center mb-12 text-gray-900">{{ __('auth.register_text') }}</h2>

        <!-- Name -->
        <div class="mb-4 ">
            <x-input-label for="name" :value="__('auth.name')" class="text-right text-gray-800 text-lg mb-3" />
            <x-text-input id="name" class="block w-full text-right px-4 py-3 rounded-2xl border border-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-300 transition duration-300" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="{{ __('auth.name_placeholder') }}" />
            <x-input-error :messages="$errors->get('name')" class="mt-3 text-red-700" />
        </div>

        <!-- Email Address -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('auth.email')" class="text-right text-gray-800 text-lg mb-3" />
            <x-text-input id="email" class="block w-full text-right px-4 py-3 rounded-2xl border border-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-300 transition duration-300" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="{{ __('auth.email_placeholder') }}" />
            <x-input-error :messages="$errors->get('email')" class="mt-3 text-red-700" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('auth.password')" class="text-right text-gray-800 text-lg mb-3" />
            <x-text-input id="password" class="block w-full text-right px-4 py-3 rounded-2xl border border-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-300 transition duration-300"
                            type="password"
                            name="password"
                            required autocomplete="new-password"
                            placeholder="{{ __('auth.password_placeholder') }}" />
            <x-input-error :messages="$errors->get('password')" class="mt-3 text-red-700" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <x-input-label for="password_confirmation" :value="__('auth.confirm_password')" class="text-right text-gray-800 text-lg mb-3" />
            <x-text-input id="password_confirmation" class="block w-full text-right px-4 py-3 rounded-2xl border border-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-300 transition duration-300"
                            type="password"
                            name="password_confirmation"
                            required autocomplete="new-password"
                            placeholder="{{ __('auth.confirm_password_placeholder') }}" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-3 text-red-700" />
        </div>

        <!-- Phone Number -->
        <div class="mb-4" style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }};">
            <x-input-label style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }};" for="phone" :value="__('auth.phone')" class="text-right text-gray-800 text-lg mb-4" />
            <x-text-input style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }};" id="phone" class="block w-full text-right px-4 py-3 rounded-2xl border border-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-300 transition duration-300" type="tel" name="phone" :value="old('phone')" required placeholder="{{ __('auth.phone_placeholder') }}" />
            <x-input-error style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }};" :messages="$errors->get('phone')" class="mt-3 text-red-700" />
        </div>

        <div class="flex flex-col space-y-6 mb-10" style="margin-top: 20px;" style="text-align: center;">
            <x-primary-button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-4 px-6 rounded-2xl transition duration-300 text-lg text-center" style="text-align: center;">
                {{ __('auth.register_button') }}
            </x-primary-button>

            <div class="text-center" style="margin-bottom: 20px;">
                <a  class="text-blue-600 hover:text-blue-800 transition duration-300" href="{{ route('login') }}">
                    {{ __('auth.already_registered') }}
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>
