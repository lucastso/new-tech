<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img src="/logo.svg" alt="logo">
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="flex flex-col text-black-24">
                <label for="email" value="{{ __('Email') }}" class="font-bold mb-2">E-mail</label>
                <input id="email" class="rounded-lg border border-black-24" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex flex-col mt-6 text-black-24">
                <label for="password" value="{{ __('Password') }}" class="font-bold mb-2">Senha</label>
                <input id="password" class="rounded-lg border border-black-24" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4 text-black-24">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-xs font-bold">{{ __('Lembrar') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-start mt-10">
                <button class="py-2 px-4 border-2 rounded mr-6 border-black-24 text-black-24 font-bold">
                    {{ __('Logar') }}
                </button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
