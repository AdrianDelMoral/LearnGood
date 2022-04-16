<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Información de Perfil') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Actualizar la información de usuario y la direccion de correo electrónico de la cuenta.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden" wire:model="photo" x-ref="photo" x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                        class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                        x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="nombre" value="{{ __('Nombre') }}" />
            <x-jet-input id="nombre" type="text" class="mt-1 block w-full" wire:model.defer="state.nombre"
                autocomplete="nombre" />
            <x-jet-input-error for="nombre" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="apellidos" value="{{ __('Apellidos') }}" />
            <x-jet-input id="apellidos" type="text" class="mt-1 block w-full" wire:model.defer="state.apellidos"
                autocomplete="apellidos" />
            <x-jet-input-error for="apellidos" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <fieldset disabled>
                <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            </fieldset>
            <x-jet-input-error for="email" class="mt-2" />
        </div>

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
        <div class="col-span-6 sm:col-span-4 flex flex-wrap">
            <div class="w-50 md:w-1/2 pr-4">
                @if (Auth::user()->pais === null)
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="pais" value="{{ __('País') }}" />
                        <x-jet-input id="pais" type="text" class="mt-1 block w-full" wire:model.defer="state.pais"
                            autocomplete="pais" placeholder="País" maxlength="27" />
                        <x-jet-input-error for="pais" class="mt-2" />
                    </div>
                @else
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="pais" value="{{ __('País') }}" />
                        <x-jet-input id="pais" type="text" class="mt-1 block w-full" wire:model.defer="state.pais"
                            autocomplete="pais" placeholder="País" value="{{ Auth::user()->pais }}" maxlength="27" />
                        <x-jet-input-error for="pais" class="mt-2" />
                    </div>
                @endif
            </div>

            <div class="w-50 md:w-1/2 pl-4">
                @if (Auth::user()->ciudad === null)
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="ciudad" value="{{ __('Ciudad') }}" />
                        <x-jet-input id="ciudad" type="text" class="mt-1 block w-full" wire:model.defer="state.ciudad"
                            autocomplete="ciudad" placeholder="Ciudad" maxlength="27" />
                        <x-jet-input-error for="ciudad" class="mt-2" />
                    </div>
                @else
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="ciudad" value="{{ __('Ciudad') }}" />
                        <x-jet-input id="ciudad" type="text" class="mt-1 block w-full" wire:model.defer="state.ciudad"
                            autocomplete="ciudad" placeholder="Ciudad" value="{{ Auth::user()->ciudad }}"
                            maxlength="27" />
                        <x-jet-input-error for="ciudad" class="mt-2" />
                    </div>
                @endif
            </div>
        </div>

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

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Guardar') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
