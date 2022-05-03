<x-jet-form-section submit="updateProfileInformation">

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden" wire:model="photo" x-ref="photo"
                    x-on:change="photoName = $refs.photo.files[0].name;const reader = new FileReader();reader.onload = (e) => {photoPreview = e.target.result;};reader.readAsDataURL($refs.photo.files[0]);" />

                {{-- <x-jet-label for="photo" value="{{ __('Photo') }}" /> --}}

                <!-- Current Profile Photo -->
                {{-- <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                        class="rounded-full h-20 w-20 object-cover">
                </div> --}}
                <div class="d-flex justify-content-center">
                    <div class="cajaImg_profesor">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <div
                                class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <img class="rounded-circle img-fluid overflow-hidden"
                                    src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->role_id }}"
                                    width="150px" height="150px" />
                            </div>
                        @else
                            <h1>{{ Auth::user()->nombre }} - Rol: {{ Auth::user()->role_id }}
                            </h1>
                        @endif
                    </div>

                    <!-- New Profile Photo Preview -->
                    <div class="mt-2 d-flex align-items-center" x-show="photoPreview" style="display: none;">
                        <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                            x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                        </span>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <button class="mt-2 mr-2 btn btn-primary profile-button" type="button"
                        x-on:click.prevent="$refs.photo.click()">
                        {{ __('Seleccionar una Nueva Foto') }}
                    </button>

                    @if ($this->user->profile_photo_path)
                        <button class="mt-2 mr-2 btn btn-primary profile-button" type="button"
                            wire:click="deleteProfilePhoto">
                            {{ __('Eliminar Foto') }}
                        </button>
                    @endif
                </div>

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        {{-- <div class="col-span-3 sm:col-span-4">
            <x-jet-label for="nombre" value="{{ __('Nombre') }}" />
            <x-jet-input id="nombre" type="text" class="mt-1 block w-full" wire:model.defer="state.nombre"
                autocomplete="nombre" />
            <x-jet-input-error for="nombre" class="mt-2" />
        </div>

        <div class="col-span-3 sm:col-span-4">
            <x-jet-label for="apellidos" value="{{ __('Apellidos') }}" />
            <x-jet-input id="apellidos" type="text" class="mt-1 block w-full" wire:model.defer="state.apellidos"
                autocomplete="apellidos" />
            <x-jet-input-error for="apellidos" class="mt-2" />
        </div> --}}
        <div class="col-span-12 sm:col-span-4">
            <div class="col-md-12 border-right">
                <div class="row mt-2">
                    <div class="col-md-6">
                        <x-jet-label for="nombre" value="{{ __('Nombre') }}" />
                        <x-jet-input id="nombre" type="text" class="form-control" wire:model.defer="state.nombre"
                            autocomplete="nombre" />
                    </div>
                    <div class="col-md-6">
                        <x-jet-label for="apellidos" value="{{ __('Apellidos') }}" />
                        <x-jet-input id="apellidos" type="text" class="form-control"
                            wire:model.defer="state.apellidos" autocomplete="apellidos" />
                    </div>
                </div>
            </div>
        </div>
        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <fieldset disabled>
                <x-jet-input id="email" type="email" class="form-control" wire:model.defer="state.email" />
            </fieldset>
            <x-jet-input-error for="email" class="mt-2" />
        </div>
        @if (Auth::user()->role_id === 'Profesor')
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="descripcion" value="{{ __('Descripcion') }}" />
                @if (Auth::user()->descripcion === null)
                    <textarea name="descripcion" id="descripcion" type="textarea" rows="5" class="w-100 mt-1 rounded rounded-3"
                        placeholder="Escribe aquí una descripción que defina tus aptitudes y especialidades"
                        wire:model.defer="state.descripcion" maxlength="255" style="resize: none;">
                    </textarea>
                @else
                    <textarea name="descripcion" id="descripcion" type="textarea" rows="5" class="w-100 mt-1 rounded rounded-3"
                        placeholder="Escribe aquí una descripción que defina tus aptitudes y especialidades"
                        wire:model.defer="state.descripcion" maxlength="255" style="resize: none;">
                    {{ Auth::user()->descripcion }}
                </textarea>
                @endif

                <x-jet-input-error for="descripcion" class="mt-2" />
            </div>
        @endif
        @if (Auth::user()->role_id === 'Profesor')
            <div class="col-span-6 sm:col-span-4 flex flex-wrap">
                <div class="col-md-12 mb-3">
                    @if (Auth::user()->idioma === null)
                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="idioma" value="{{ __('Idioma') }}" />
                            <x-jet-input id="idioma" type="text" class="mt-1 block w-full"
                                wire:model.defer="state.idioma" autocomplete="idioma" placeholder="Idioma"
                                maxlength="27" />
                            <x-jet-input-error for="idioma" class="mt-2" />
                        </div>
                    @else
                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="idioma" value="{{ __('Idioma') }}" />
                            <x-jet-input id="idioma" type="text" class="mt-1 block w-full"
                                wire:model.defer="state.idioma" autocomplete="idioma" placeholder="País"
                                value="{{ Auth::user()->idioma }}" maxlength="27" />
                            <x-jet-input-error for="idioma" class="mt-2" />
                        </div>
                    @endif
                </div>
            </div>
        @endif

        {{-- <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="textarea" value="{{ __('descripcion') }}" />
            <textarea name="" id="" cols="61" rows="10" class="mt-1 rounded rounded-3" placeholder="Descripcion" wire:model.defer="state.descripcion">
                @if (Auth::user()->descripcion === null)
                    La descripción del usuario actualmente está vacia. Prueba a rellenar el campo desde
                        el formulario proporcionado con el boton editar.
                @else

                @endif
                <x-jet-input-error for="descripcion" class="mt-2" />
            </textarea>
            <x-jet-input-error for="email" class="mt-2" />
        </div> --}}
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Guardada.') }}
        </x-jet-action-message>

        <button wire:loading.attr="disabled" class="mt-2 mr-2 btn btn-primary profile-button" wire:target="photo">
            {{ __('Guardar') }}
        </button>
    </x-slot>
</x-jet-form-section>
