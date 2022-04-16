{{-- <nav class="navbar navbar-expand-xxl navbar-dark bg-dark" aria-label="Seventh navbar example">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Expand at xxl</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleXxl"
            aria-controls="navbarsExampleXxl" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleXxl">
            <ul class="navbar-nav me-auto mb-2 mb-xl-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownXxl" data-bs-toggle="dropdown"
                        aria-expanded="false">Dropdown</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownXxl">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
            </ul>
            <form>
                <input class="form-control" type="text" placeholder="Search" aria-label="Search">
            </form>
        </div>
    </div>
</nav> --}}
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
                                <a class="dropdown-item" href="{{ route('profile.show') }}">Perfil</a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="{{-- {{ route('Profesor.show') }} --}}">Perfil Vista Alumno</a>
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

{{-- <div class="navigation">
    <div class="menu_toggle"></div>
    <div class="profile">
        <div class="imgBx">
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <div
                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                        alt="{{ Auth::user()->role_id }}" />
                </div>
            @else
                <h1>{{ Auth::user()->nombre }} - Rol: {{ Auth::user()->role_id }}
                </h1>
            @endif
        </div>
    </div>
    <ul class="menu">
        <li>
            <a href="#">
                <span class="icon">
                    <ion-icon name="person-outline"></ion-icon>
                </span>
                <span class="text">Profile</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="icon">
                    <ion-icon name="chatbox-outline"></ion-icon>
                </span>
                <span class="text">Inbox</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="icon">
                    <ion-icon name="settings-outline"></ion-icon>
                </span>
                <span class="text">Settings</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="icon">
                    <ion-icon name="help-circle-outline"></ion-icon>
                </span>
                <span class="text">Support</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="icon">
                    <ion-icon name="log-out-outline"></ion-icon>
                </span>
                <span class="text">Logout</span>
            </a>
        </li>
    </ul>
</div> --}}

