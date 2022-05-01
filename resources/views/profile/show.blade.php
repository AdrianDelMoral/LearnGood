<x-app-layout>
    <div class="container rounded bg-white mt-5 mb-5 p-5">

        {{-- <div class="d-flex flex-column align-items-center col-md-12"> --}}
        <div class="shadow">
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
                    <button class="m-5 btn btn-primary profile-button">Ver mis precios</button>
                    <button class="m-5 btn btn-primary profile-button">Ver mis alumnos(Tanto pendientes como los que ya se les ha impartido clase)</button>
                </div>
            @endif

        </div>
        {{-- @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                        <div class="mt-10 sm:mt-0">
                            @livewire('profile.two-factor-authentication-form')
                        </div>

                        <x-jet-section-border />
                        @endif --}}

        {{-- @livewire('profile.logout-other-browser-sessions-form') --}}

        @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
            {{-- <x-jet-section-border /> --}}
            {{-- @livewire('profile.delete-user-form') --}}{{-- profile/delete-user-form --}}
        @endif


    </div>
    {{-- </div> --}}
</x-app-layout>
