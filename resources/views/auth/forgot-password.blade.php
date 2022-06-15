<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
        <img src="/logo.svg" alt="logo">
        </x-slot>

        <div class="mb-4 text-sm text-black-24">
            {{ __('Esqueceu sua senha? Sem problemas, apenas insira o seu e-mail da conta abaixo:') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="flex flex-col text-black-24">
                <label for="email" value="{{ __('Email') }}" class="font-bold mb-2">E-mail:</label>
                <input id="email" class="rounded-lg border border-black-24" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-start mt-10">
            <button class="py-2 px-4 border-2 rounded border-black-24 text-black-24">
                    {{ __('Link para receber e-mail') }}
                </button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
