<x-app-layout>
    <div class="container rounded mt-5 mb-5 p-5">

        {{-- <div class="d-flex flex-column align-items-center col-md-12"> --}}
        <div class="bg-white sm:rounded-md sm:rounded-md">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')
                {{-- <x-jet-section-border /> --}}
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                @livewire('profile.update-password-form'){{-- profile/update-password-form --}}
                {{-- <x-jet-section-border /> --}}
            @endif

            @if (Auth::user()->role_id == 'Profesor')
                <div class="d-flex justify-content-center">
                    <div>
                        <a href="precios.index">
                            <button class="m-5 btn btn-primary profile-button">Ver mis precios</button>
                        </a>
                    </div>
                    <div>
                        <a href="ordersteacher.index">
                            <button class="m-5 btn btn-primary profile-button">Ver mis alumnos(Tanto pendientes como los
                                que
                                ya se les ha impartido clase)</button>
                        </a>
                    </div>
                </div>
            @endif
            <div class="d-flex justify-content-center">
                @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                    {{-- editar css vendor\laravel\jetstream\resources\views\components\action-section.blade.php --}}
                    @livewire('profile.delete-user-form'){{-- profile/delete-user-form --}}
                @endif
            </div>
        </div>
        {{-- @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                        <div class="mt-10 sm:mt-0">
                            @livewire('profile.two-factor-authentication-form')
                        </div>

                        <x-jet-section-border />
                        @endif --}}

        {{-- @livewire('profile.logout-other-browser-sessions-form') --}}



    </div>
    {{-- </div> --}}
</x-app-layout>
