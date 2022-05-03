<x-guest-layout>
    <x-jet-authentication-card> {{-- vendor\laravel\jetstream\resources\views\components\authentication-card.blade.php --}}

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="py-5 flex justify-center">
                <a href="/">
                    <img src="imagenes/generales/logo.png" alt="logo" style="width:4.8rem; height:4rem;">
                </a>
            </div>

            <div class="mt-4">
                <div class="rol_selected">
                    <x-jet-label for="role_id" value="{{ __('Registrarme Como:') }}" class="text-white" />
                    <select name="role_id"
                        class="roles block mt-1 w-full border-gray-300 bg-gray-800 text-yellow-500 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option selected disabled>Selecciona tu Tipo de Usuario</option>
                        <option value="Alumno">Alumno</option>
                        <option value="Profesor">Profesor</option>
                    </select>
                </div>
                <div class="decir_rol hidden">

                </div>
                <div class="select_other flex justify-center content-center hidden">
                    <button id="bad_role"
                        class="items-center my-7 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs  text-yellow-500 uppercase tracking-widest hover:bg-gray-700 active:bg-gray-800 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Seleccionar otro tipo de usuario</button>
                </div>

            </div>

            <div class="rol_seleccionado hidden">
                <div class="mt-4">
                    <x-jet-label for="nombre" value="{{ __('Nombre') }}" class="text-white" />
                    <x-jet-input id="nombre" class="block mt-1 w-full bg-gray-800  text-yellow-500" type="text" name="nombre" :value="old('nombre')"
                        required autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="apellidos" value="{{ __('Apellidos') }}" class="text-white" />
                    <x-jet-input id="apellidos" class="block mt-1 w-full bg-gray-800  text-yellow-500" type="text" name="apellidos" :value="old('apellidos')"
                        required autofocus autocomplete="apellidos" />
                </div>

                <div class="mt-4 profesor hidden">
                    <x-jet-label for="idioma" value="{{ __('Idioma') }}" class="text-white" />
                    <x-jet-input id="idioma" class="block mt-1 w-full bg-gray-800  text-yellow-500" type="text" name="idioma" :value="old('idioma')"
                        required autofocus autocomplete="idioma" />
                </div>

                <div class="mt-4 profesor hidden">
                    <x-jet-label for="descripcion" value="{{ __('Descripción sobre el Profesor') }}"
                        class="text-white" />
                    {{-- <label for="descripcion" class="labels">Descripción sobre el Profesor</label> --}}
                    <textarea id="descripcion"
                        class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm bg-gray-800  text-yellow-500"
                        rows="3" style="resize: none;"
                        name="descripcion"
                        :value="old('descripcion')"
                        placeholder="Escribe aquí una breve descripción sobre ti."
                        autofocus
                        autocomplete="descripcion"></textarea>
                </div>


                <div class="mt-4">
                    <x-jet-label for="email" value="{{ __('Email') }}" class="text-white" />
                    <x-jet-input id="email" class="block mt-1 w-full bg-gray-800  text-yellow-500" type="email"
                        name="email"
                        :value="old('email')"
                        required />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Password') }}" class="text-white" />
                    <x-jet-input id="password" class="block mt-1 w-full bg-gray-800  text-yellow-500" type="password" name="password" required
                        autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}"
                        class="text-white" />
                    <x-jet-input id="password_confirmation" class="block mt-1 w-full bg-gray-800  text-yellow-500" type="password"
                        name="password_confirmation" required autocomplete="new-password" />
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-jet-label for="terms">
                            <div class="flex items-center">
                                <x-jet-checkbox class=" bg-gray-800 text-yellow-500" name="terms" id="terms" required />
                                <div class="ml-2"> {!! __('Estoy de acuerdo con los :terms_of_service y la :privacy_policy', ['terms_of_service' => '<a target="_blank" href="' . route('terms.show') . '" class="underline text-sm text-gray-900 hover:text-red-600">' . __('Terminos de Servicio') . '</a>', 'privacy_policy' => '<a target="_blank" href="' . route('policy.show') . '" class="underline text-sm text-gray-900 hover:text-red-600">' . __('Politica de Privacidad') . '</a>']) !!} </div>
                            </div>
                        </x-jet-label>
                    </div>
                @endif

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm transition-all hover:text-gray-900"
                        href="{{ route('login') }}">
                        {{ __('Ya registrado?') }} </a>
                    <x-jet-button class="ml-4"> {{ __('Registrarme') }} </x-jet-button>
                </div>
            </div>
            <x-jet-validation-errors class="mb-4" />
        </form>

    </x-jet-authentication-card>
</x-guest-layout>
