<x-guest-layout>
    <x-jet-authentication-card> {{-- vendor\laravel\jetstream\resources\views\components\authentication-card.blade.php --}}

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="py-5 flex justify-center">
                <a href="/">
                    <img src="imagenes/form_LogReg/logo.png" alt="logo" style="width:4.8rem; height:4rem;">
                </a>
            </div>

            <div class="mt-4">
                <x-jet-label for="role_id" value="{{ __('Registrarme Como:') }}" class="text-white" />
                <select name="role_id"
                    class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option selected disabled>Selecciona tu Tipo de Usuario</option>
                    <option value="Alumno">Alumno</option>
                    <option value="Profesor">Profesor</option>
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="nombre" value="{{ __('Nombre') }}" class="text-white"/>
                <x-jet-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required
                    autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="apellidos" value="{{ __('Apellidos') }}" class="text-white"/>
                <x-jet-input id="apellidos" class="block mt-1 w-full" type="text" name="apellidos" :value="old('apellidos')"
                    required autofocus autocomplete="name" />
            </div>
            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" class="text-white"/>
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" class="text-white"/>
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>
            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="text-white"/>
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms" required/>
                            <div class="ml-2"> {!! __('Estoy de acuerdo con los :terms_of_service y la :privacy_policy', ['terms_of_service' => '<a target="_blank" href="' . route('terms.show') . '" class="underline text-sm text-gray-900 hover:text-red-600">' . __('Terminos de Servicio') . '</a>', 'privacy_policy' => '<a target="_blank" href="' . route('policy.show') . '" class="underline text-sm text-gray-900 hover:text-red-600">' . __('Politica de Privacidad') . '</a>']) !!} </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <x-jet-validation-errors class="mb-4" />
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-white transition-all hover:text-gray-900"
                    href="{{ route('login') }}">
                    {{ __('Ya registrado?') }} </a>
                <x-jet-button class="ml-4"> {{ __('Registrarme') }} </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
