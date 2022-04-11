<x-guest-layout>
    <x-jet-authentication-card>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="py-5 flex justify-center">
                <a href="/">
                    <img src="imagenes/form_LogReg/logo.png" alt="logo" style="width:4rem; height:4rem;">
                </a>
            </div>
            <div class="block mb-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus />
            </div>

            <div class="form-outline mb-4">
                <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-900">{{ __('Recordar') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-white hover:text-gray-900 transition-all"
                        href="{{ route('password.request') }}">
                        {{ __('No recuerdas tu contraseña?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Iniciar Sesión') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
