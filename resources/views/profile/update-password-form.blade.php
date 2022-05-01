<x-jet-form-section submit="updatePassword">

    <x-slot name="form">
        <div class="">
            <x-jet-label for="current_password" value="{{ __('Contraseña Actual') }}" />
            <x-jet-input id="current_password" type="password" class="mt-1 block w-full" wire:model.defer="state.current_password" autocomplete="current-password" />
            <x-jet-input-error for="current_password" class="mt-2" />
        </div>

        <div class="">
            <x-jet-label for="password" value="{{ __('Nueva Contraseña') }}" />
            <x-jet-input id="password" type="password" class="mt-1 block w-full" wire:model.defer="state.password" autocomplete="new-password" />
            <x-jet-input-error for="password" class="mt-2" />
        </div>

        <div class="">
            <x-jet-label for="password_confirmation" value="{{ __('Confirmar nueva Contraseña') }}" />
            <x-jet-input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
            <x-jet-input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Guardada.') }}
        </x-jet-action-message>

        <button class="mt-2 mr-2 btn btn-primary profile-button">
            {{ __('Guardar') }}
        </button>
    </x-slot>
</x-jet-form-section>
