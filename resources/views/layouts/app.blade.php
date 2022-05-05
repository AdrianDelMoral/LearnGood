<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- Bootstrap Link CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Bootstrap Link JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Link CSS locales-->
    <link rel="stylesheet" href="{{ URL::asset('css/profesor/profesor_inicio.css') }}">{{-- Se incluirá el css de public/css/navFooter.css --}}
    <link rel="stylesheet" href="{{ URL::asset('css/navFooter.css') }}">{{-- Se incluirá el css de public/css/navFooter.css --}}
    @livewireStyles
    <!-- Link ICONOS-->
    <script src="https://kit.fontawesome.com/75b8de379c.js" crossorigin="anonymous"></script>
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-sans bg_gradient_twoColors antialiased">

    <x-jet-banner />

    {{-- @include('partials.nav') --}}{{-- Se incluirá el nav de partials/nav.blade.php --}}
    <div class="min-h-screen bg-gray-300">
        @yield('cuerpo')
        @livewire('navigation-menu')

        <!-- Page Content -->
        <main>
            {{ $slot }} {{-- dashboard.blade.php --}}
        </main>
    </div>
    @include('partials.footer'){{-- Se incluirá el nav de partials/nav.blade.php --}}

    @stack('modals')

    @livewireScripts
</body>

</html>
