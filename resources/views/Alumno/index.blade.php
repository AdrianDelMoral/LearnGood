@extends('layout')
@section('titulo', 'Alumno View')
@section('cuerpo')
    <div class="container my-5">
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->role_id }}" />
            </button>
        @else
            <h1>{{ Auth::user()->nombre }} - Rol:
                {{ Auth::user()->role_id }}
            </h1>
        @endif


        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <div>
                        <div class="mx-4 my-3">
                            <a href="{{ route('profile.show') }}" class="bootstrap-time">Perfil</a>
                        </div>
                        <div class="mx-4 my-3">
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-jet-dropdown-link>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="bootstrap-time">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="bootstrap-time">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>

{{-- cosas de jetstream del perfil.... --}}
    {{-- <div>
        <div class="ml-3 container">
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <button
                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                        alt="{{ Auth::user()->role_id }}" />
                </button>
            @else
                <h1>{{ Auth::user()->nombre }} - Rol:
                    {{ Auth::user()->role_id }}
                </h1>
            @endif

            <!-- Account Management -->
            <div class="block px-4 py-2 text-xs text-gray-400">
                {{ __('Manage Account') }}
            </div>

            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                {{ __('Profile') }}
            </x-jet-dropdown-link>

            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                    {{ __('API Tokens') }}
                </x-jet-dropdown-link>
            @endif

            <div class="border-t border-gray-100"></div>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf

                <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                    {{ __('Log Out') }}
                </x-jet-dropdown-link>
            </form>
        </div>
    </div> --}}
@endsection
