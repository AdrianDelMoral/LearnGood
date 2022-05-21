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
                    {{-- <img src="{{ asset('imagenes/generales/logo.png') }}" alt="logo" style="width:4.8rem; height:4rem;"> --}}
                </a>
                <h1 class="navTitle">Learn Good</h1>
            </div>
            <div class="nav__div_segundo">
                <a class="text-white btn boton_div-nav mx-3" href="/">Inicio</a>
                <div class="btn-group">
                    <button type="button" class="btn boton_div-nav mx-3 dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Login y Registro
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li>
                            <a class="dropdown-item" href="{{ route('login') }}">Iniciar Sesión</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('register') }}">Registrarse</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
