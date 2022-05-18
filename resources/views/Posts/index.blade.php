@extends('layout')

@section('titulo', 'Listado de Cursos')

@section('CSSadded')
    <link rel="stylesheet" href="{{ URL::asset('css/profesor/profesor_show.css') }}">
@endsection

@section('cuerpo')
    @if (Auth::user()->role_id == 'Profesor')
        <div class="d-flex justify-content-end">
            <button class="m-4 btn btn-primary">Boton para editar</button>
        </div>
    @endif
    @if (isset())

    @endif
<div class="container">
    <h1 class="fw-bold">Listado de Posts de este Curso</h1>
    <h2 class="fw-bold">Estructura de posts:</h2>
    <ol>
        <li>Index: listado de posts, estilo card, y comprobar si el usuario alumno que esta en el curso, ha pagado(status true)</li>
        <li>Show: Ver un post en concreto sobre ese curso</li>
        <li>Edit: editar info de ese post en concreto</li>
        <li>Update: actualizar algo de ese post en concreto</li>
        <li>Delete: Eliminar algun post en concreto</li>
    </ol>
</div>

@endsection
