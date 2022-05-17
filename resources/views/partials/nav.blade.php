<nav class="navbar navbar-expand-xl navbar-dark bg-dark" aria-label="Seventh navbar example">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleXxl"
            aria-controls="navbarsExampleXxl" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="contenidoNav collapse navbar-collapse" id="navbarsExampleXxl">
            <div class=" nav__div_primero">
                <a href="/">
                    <x-jet-application-mark />
                </a>
                <h1 class="navTitle">Learn Good</h1>
            </div>
            <div class="nav__div_segundo">
                <a  class="btn boton_div-nav text-white  mx-3" href="/">
                    <div class="px-4 py-2" >
                        Inicio
                    </div>
                </a>
                @if (Auth::User()->role_id === 'Admin')
                    <a  class="btn boton_div-nav text-white  mx-3" href="{{ route('manageusers.index') }}">
                        <div class="px-4 py-2" >
                            Gestionar Usuarios
                        </div>
                    </a>

                    <a class="btn boton_div-nav text-white mx-3" href="{{ route('platforms.index') }}">
                        <div class="px-4 py-2">Plataformas</div>
                    </a>

                    <a class="btn boton_div-nav text-white  mx-3" href="{{ route('levels.index') }}">
                        <div class="px-4 py-2">
                            Categorias de Estudios
                        </div>
                    </a>
                @endif
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
