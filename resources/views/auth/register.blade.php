<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div>
                <x-jet-label for="user_name" value="{{ __('ユーザーネーム') }}" />
                <x-jet-input id="user_name" class="block mt-1 w-full" type="text" name="user_name" :value="old('user_name')" required autofocus autocomplete="user_name" />
            </div>

            <div>
                <x-jet-label for="user_id" value="{{ __('ユーザーID') }}" />
                <x-jet-input id="user_id" class="block mt-1 w-full" type="text" name="user_id" :value="old('user_id')" required autofocus autocomplete="user_id" />
            </div>

            <div>
                <x-jet-label for="first_name" value="{{ __('姓') }}" />
                <x-jet-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" />
            </div>

            <div>
                <x-jet-label for="last_name" value="{{ __('名') }}" />
                <x-jet-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
            </div>

            <div>
                <x-jet-label for="first_name_kana" value="{{ __('セイ') }}" />
                <x-jet-input id="first_name_kana" class="block mt-1 w-full" type="text" name="last_name_kana" :value="old('last_name_kana')" required autofocus autocomplete="last_name_kana" />
            </div>

            <div>
                <x-jet-label for="last_name_kana" value="{{ __('メイ') }}" />
                <x-jet-input id="last_name_kana" class="block mt-1 w-full" type="text" name="first_name_kana" :value="old('first_name_kana')" required autofocus autocomplete="first_name_kana" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>