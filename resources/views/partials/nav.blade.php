<nav class="nav bg-dark">
    <div class="nav__div_primero">
        <a href="/">
            <img src="imagenes/form_LogReg/logo.png" alt="logo" style="width:4rem; height:4rem;">
        </a>
        <h1 class="navTitle">Learn Good</h1>
    </div>
    <div class="nav__div_segundo">
        @if (Route::has('login'))
            @auth
                <a href="{{ route('profile.show') }}">
                    <button class="boton_div-nav mx-3">
                        <span class="boton_div-span">
                            Perfil
                        </span>
                    </button>
                </a>
            @else
                <div class="nav__div_segundo__subdiv">
                    <a href="{{ route('login') }}">
                        <button class="boton_div-nav mx-3">
                            <span class="boton_div-span">
                                Iniciar Sesión
                            </span>
                        </button>
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">
                            <button class="boton_div-nav mx-3">
                                <span class="boton_div-span">
                                    Registrarse
                                </span>
                            </button>
                        </a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</nav>
{{-- <div class="ml-3 relative">
    <x-jet-dropdown align="right" width="48">
        <x-slot name="trigger">
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <button
                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                        alt="{{ Auth::user()->role_id }}" />
                </button>
            @else
                <span class="inline-flex rounded-md">
                    <button type="button"
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                        {{ Auth::user()->nombre }} - Rol:
                        {{ Auth::user()->role_id }}

                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </span>
            @endif
        </x-slot>

        <x-slot name="content">
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
        </x-slot>
    </x-jet-dropdown>
</div> --}}
{{-- <nav>
    <div class="ml-8 py-5 flex justify-between text-4xl xs:text-2xl text-center items-center">
        <a href="/">
            <img src="imagenes/form_LogReg/logo.png" alt="logo" style="width:4rem; height:4rem;">
        </a>
        <h1 class="ml-8">Learn Good</h1>
    </div>
    @if (Route::has('login'))
        <div class="mx-8">
            @auth
                <button>
                    <span>
                        <a href="{{ url('/dashboard') }}">
                            Dashboard
                        </a>
                    </span>
                </button>
            @else
                <div class="flex text-center">
                    <button>
                        <span>
                            <a href="{{ route('login') }}">
                                Iniciar Sesión
                            </a>
                        </span>
                    </button>
                    @if (Route::has('register'))
                        <button>
                            <span>
                                <a href="{{ route('register') }}">
                                    Registrarse
                                </a>
                            </span>
                        </button>
                    @endif
                </div>
            @endauth
        </div>
    @endif

</nav> --}}
