@extends('layout')

@section('titulo', 'Listado de Cursos')

@section('CSSadded')
    <link rel="stylesheet" href="{{ URL::asset('css/profesor/profesor_show.css') }}">
@endsection

@section('cuerpo')
    @if (Auth::user()->role_id == 'Profesor')
        <div class="d-flex justify-content-end">{{-- posts.createPost, $postsDelCurs --}}
            @if (count($posts) >= 1)
            <a href="{{ route('posts.createPost', $Curso->id) }}" class="m-4 btn btn-success border-dark">
                Crear Post
            </a>
            @endif

            {{-- Dentro de las tarjetas de temas  --}}
                {{-- <a href="{{ route('posts.infoPost') }}" class="m-4 btn btn-secondary border-dark">
                    Ver
                </a>
                <a href="{{ route('posts.edit') }}" class="m-4 btn btn-primary border-dark">
                    Editar
                </a>
                <a href="{{ route('posts.destroy') }}" class="m-4 btn btn-danger border-dark">
                    Eliminar
                </a> --}}
            {{-- Dentro de las tarjetas de temas  --}}
        </div>
        <!-- editar y eliminar -->
    @endif
    <!-- editar y eliminar -->
    <div class="p-4">

        <h1 class="text-center"><u>	{{ $Curso->nombreCurso }}</u></h1>

        @if (count($posts) == 0)
            <div class="container my-5">
                <h1 class="fw-bold mb-5">Aún no se han creado Posts en este curso aun.</h1>
                @if (Auth::user()->role_id == 'Profesor')
                    <a href="{{ route('posts.createPost', $Curso) }}" class="btn btn-success mb-5 border-dark">Crear Post</a>
                @endif
                <h2 class="fw-bold">Estructura de posts:</h2>
                <ol class="fw-bold mb-5">
                    <li>Show: Ver un post en concreto sobre ese curso</li>
                    <li>Edit: editar info de ese post en concreto</li>
                    <li>Update: actualizar algo de ese post en concreto</li>
                    <li>Delete: Eliminar algun post en concreto</li>

                </ol>
            </div>
        @else
            <h1 class="fw-bold">Listado de Posts de este Curso</h1>
            <div class="text-light bg-danger">
                @foreach ($posts as $post)
                {{ $post->titulo }}
                <br><br>
                @endforeach
            </div>
        @endif
    </div>


    <!-- Bucle de post -->
    <!-- Dentro del bucle en cada tarjeta del post -->
    <!-- Bucle de post -->

@endsection
