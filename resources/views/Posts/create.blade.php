@extends('layout')

@section('titulo', 'Formulario Plataformas')

@section('CSSadded')
    <link rel="stylesheet" href="{{ URL::asset('css/profesor/posts.css') }}">
@endsection

@section('cuerpo')
    <div class="container py-5 text-center">

        <h1>Crear Post</h1>

        <form action="{{ route('posts.store') }}" method="post">

            @csrf

            <input required hidden type="number" name="courses_id" id="courses_id" value="{{ $idCurso }}" required>

            <div class="mb-3">
                <label for="titulo" class="h4 form-label">Titulo del Post</label>
                <input class="form-control" type="text" name="titulo" id="titulo" placeholder="Titulo del Post">
                @error('titulo')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="entrada" class="h4 form-label">Entrada del Post</label>
                <textarea class="form-control" name="entrada" id="entrada" cols="30" rows="10" placeholder="Escriba aqui la entrada principal del Post" required></textarea>
                @error('entrada')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-info border-dark">Crear Post</button>
        </form>
    </div>
    <div class="container">
        <a href="{{ route('posts.index') }}"><button class="btn btn-primary mt-1 mb-5">Volver al Listado</button></a>
    </div>
@endsection
