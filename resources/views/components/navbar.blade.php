<nav class="flex justify-between text-white text-center items-center bg-gray-900">
    <div class="ml-8 py-5 flex justify-between text-4xl xs:text-2xl text-center items-center">
        <a href="/">
            <img src="{{ asset('imagenes/generales/logo.png') }}" alt="logo" style="width:4.8rem; height:4rem;">
        </a>
        <h1 class="ml-8">Learn Good</h1>
    </div>
    @if (Route::has('login'))
        <div class="mx-8">
            @auth
                <button class="mx-8 relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                    <span
                        class="text-white font-bold boton-hover px-5 py-3 transition-all ease-in duration-75 bg-gray-900 rounded-md">
                        <a href="{{ url('/dashboard') }}">
                            Dashboard
                        </a>
                    </span>
                </button>
            @else
                <div class="flex text-center">
                    <button
                        class="mx-8 relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 text-sm font-medium rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                        <span
                        class="text-white font-bold boton-hover px-5 py-3 bg-gray-900 rounded-md">
                            <a href="{{ route('login') }}">
                                Iniciar Sesión
                            </a>
                        </span>
                    </button>
                    @if (Route::has('register'))
                    <button
                        class="mx-8 relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 text-sm font-medium rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                        <span
                            class="text-white font-bold boton-hover px-5 py-3 bg-gray-900 rounded-md">
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

</nav>
