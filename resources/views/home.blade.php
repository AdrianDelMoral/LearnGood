<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- Iconos Online -->
    <script src="https://kit.fontawesome.com/75b8de379c.js" crossorigin="anonymous"></script>

    <!-- Link CSS locales-->
    <link rel="stylesheet" href="{{ URL::asset('css/navFooter.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/home.css') }}">

    <title>@yield('titulo')</title>
</head>

<body>
    @include('partials.navHome')
    <x-home-cuerpo></x-home-cuerpo>
    @include('partials.footer')
</body>

</html>
