<x-krak-layout>
    <x-slot name="description">Registreer</x-slot>
    <x-slot name="title">Registreer</x-slot>
    <x-slot name="name">Sebastiaan Daniels</x-slot>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf


            <div>
                <x-label for="first_name" value="{{ __('First name') }}" />
                <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="name" />
            </div>

            <div>
                <x-label for="sur_name" value="{{ __('Last name') }}" />
                <x-input id="sur_name" class="block mt-1 w-full" type="text" name="sur_name" :value="old('sur_name')" required autofocus autocomplete="name" />
            </div>

            <div>
                <x-label for="telephone_number" value="{{ __('Phone number') }}" />
                <x-input id="telephone_number" class="block mt-1 w-full" type="text" name="telephone_number" :value="old('telephone_number')" required autofocus autocomplete="name" />
            </div>

            <div>
                <x-label for="street_name" value="{{ __('Street name') }}" />
                <x-input id="street_name" class="block mt-1 w-full" type="text" name="street_name" :value="old('street_name')" required autofocus autocomplete="name" />
            </div>

            <div>
                <x-label for="house_number" value="{{ __('House number') }}" />
                <x-input id="house_number" class="block mt-1 w-full" type="text" name="house_number" :value="old('house_number')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div>
                <x-label for="birthdate" value="{{ __('Birth date') }}" />
                <x-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate" :value="old('birthdate')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-krak-layout>
