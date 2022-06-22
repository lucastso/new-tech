<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img src="/logo.svg" alt="logo">
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="flex flex-col text-black-24">
                <label for="name" value="{{ __('Name') }}" class="font-bold mb-2 text-black-24">Nome</label>
                <input class="rounded-lg border border-black-24" id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="flex flex-col text-black-24 mt-6">
                <label for="email" value="{{ __('Email') }}" class="font-bold mb-2 text-black-24">E-mail</label>
                <input class="rounded-lg border border-black-24" id="email" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="flex flex-col text-black-24 mt-6">
                <label for="password" value="{{ __('Password') }}" class="font-bold mb-2 text-black-24">Senha</label>
                <input class="rounded-lg border border-black-24" id="password" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="flex flex-col text-black-24 mt-6">
                <label for="password_confirmation" value="{{ __('Confirm Password') }}" class="font-bold mb-2 text-black-24">Confirmar senha</label>
                <input class="rounded-lg border border-black-24" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-start mt-10">
                <button class="py-2 px-4 border-2 rounded mr-6 border-black-24 text-black-24 font-bold">
                    {{ __('Registrar') }}
                </button>
                <a class="underline text-xs text-gray-600" href="{{ route('login') }}">
                    {{ __('Já estou registrado') }}
                </a>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
