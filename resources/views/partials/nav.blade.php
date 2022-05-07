<nav class="navbar navbar-expand-xl navbar-dark bg-dark" aria-label="Seventh navbar example">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleXxl"
            aria-controls="navbarsExampleXxl" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="contenidoNav collapse navbar-collapse" id="navbarsExampleXxl">
            <div class=" nav__div_primero">
                <a href="/">
                    <x-jet-application-mark/>
                    {{-- <img src="{{ asset('imagenes/generales/logo.png') }}" alt="logo" style="width:4.8rem; height:4rem;"> --}}
                </a>
                <h1 class="navTitle">Learn Good</h1>
            </div>
            <div class="nav__div_segundo">
                <div class="btn boton_div-nav text-white  mx-3">
                    <a class="px-4 py-2" href="/">Inicio</a>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn boton_div-nav mx-3 dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <div class="fotoPerfil">
                            <div class="cajaImg">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <div
                                        class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-8 w-8 rounded-full object-cover"
                                            src="{{ Auth::user()->profile_photo_url }}"
                                            alt="{{ Auth::user()->role_id }}" />
                                    </div>
                                @else
                                    <h1>{{ Auth::user()->nombre }} - Rol: {{ Auth::user()->role_id }}
                                    </h1>
                                @endif
                            </div>
                        </div>
                        Perfil
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        @auth
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.show') }}">Editar Perfil</a>
                            </li>
                            @if (Auth::user()->role_id == 'Profesor')
                                <li>
                                    <a class="dropdown-item" href="{{-- {{ route('Profesor.show') }} --}}">Vista Alumno</a>
                                </li>
                            @endif

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" id="logout" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        Cerrar Sesión
                                    </a>
                                </li>
                            </form>
                        @else
                            <li>
                                <a class="dropdown-item" href="{{ route('login') }}">Iniciar Sesión</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('register') }}">Registrarse</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
