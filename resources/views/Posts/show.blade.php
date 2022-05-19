@extends('layout')

@section('titulo', 'Listado de Cursos')

@section('CSSadded')
    <link rel="stylesheet" href="{{ URL::asset('css/profesor/profesor_show.css') }}">
@endsection

@section('cuerpo')
    @if (Auth::user()->role_id == 'Profesor')
        <div class="d-flex justify-content-end">{{-- posts.createPost, $postsDelCurs --}}
            <a href="{{ route('posts.create' /* $idCurso */) }}" class="btn btn-success my-3 border-dark">
                Crear Post
            </a>
        </div>
        <!-- editar y eliminar -->
        <div class="d-flex justify-content-end">

            <div class="d-flex justify-content-end">
                <button class="m-4 btn btn-success">Boton para editar</button>
            </div>

            <div class="d-flex justify-content-end">
                <button class="m-4 btn btn-danger">Boton para Eliminar</button>
            </div>
        </div>
        <!-- editar y eliminar -->
    @endif
    <!-- editar y eliminar -->
    <div class="bg-dark text-white p-4">
@if (count($posts) == 1)
    <div class="container my-5">
        <h3>No tiene cursos creados aun</h3>
        <a href="{{ route('posts.create', $idCurso) }}" class="btn btn-success my-3 border-dark">Crear Post</a>
        <h1 class="fw-bold mb-5">No tiene Posts / Temarios este curso aun.</h1>
        <h2 class="fw-bold">Estructura de posts:</h2>
        <ol class="fw-bold mb-5">
            <li>Index: listado de posts, estilo card, y comprobar si el usuario alumno que esta en el curso, ha
                pagado(status true)</li>
            <li>Show: Ver un post en concreto sobre ese curso</li>
            <li>Edit: editar info de ese post en concreto</li>
            <li>Update: actualizar algo de ese post en concreto</li>
            <li>Delete: Eliminar algun post en concreto</li>
        </ol>
    </div>
@else
    <h1 class="fw-bold">Listado de Posts de este Curso</h1>
    @foreach ($posts as $post)
        <br>
        {{ $post->id }}
        <br>
        {{ $post->titulo }}
    @endforeach
@endif
    </div>
    {{ $Curso }}


    <!-- Bucle de post -->
    <!-- Dentro del bucle en cada tarjeta del post -->
    <!-- Bucle de post -->

@endsection
