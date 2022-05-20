@extends('layout')

@section('titulo', 'Listado de Cursos')

@section('CSSadded')
    <link rel="stylesheet" href="{{ URL::asset('css/profesor/profesor_show.css') }}">
@endsection

@section('cuerpo')
    <div class="p-4">
        <h1 class="text-center fw-bold">Listado de Posts de este Curso{{ $Curso->nombreCurso }}</h1>
        <h2>Usuario: {{ Auth::user()->role_id }}</h2>
        @if ($status == 0)
            @if (count($posts) == 0)
                <div class="container my-5">
                    <h1 class="fw-bold mb-5">Aún no se han creado Posts en este curso aun.</h1>
                </div>
            @else
                'hola'
                <div class="text-dark bg-warning p-5">
                    @foreach ($posts as $post)
                        {{ $post }}
                        <br>
                    @endforeach
                </div>
            @endif
        @else
        <div class="container d-flex justify-content-center align-content-center">
            <div class="card bg-dark text-light">
                <div class="card-header">
                    Acceso No Permitido
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>Debes Comprar el curso para poder ver el contenido de el.</p>
                        </footer>
                    </blockquote>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection
