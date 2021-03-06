@extends('layout')

@section('titulo', 'Formulario Plataformas')

@section('CSSadded')
    <link rel="stylesheet" href="{{ URL::asset('css/profesor/posts.css') }}">
@endsection

@section('cuerpo')
    <div class="container py-5 text-center">

        <h1><u>Crear Post</u></h1>

        <form action="{{ route('cursosposts.store') }}" method="post" enctype="multipart/form-data">

            @csrf
            <input required hidden type="number" name="courses_id" id="courses_id" value="{{ $Curso }}" required>

            <div class="mb-3">
                <label for="imagePost" class="h4 form-label">Portada del Post</label>
                <input class="form-control" type="file" accept="image/*" name="imagePost"
                    id="imagePost">
                    <p class="text-warning bg-dark rounded">Imagen sobre el post, para que se muestre a todo el mundo</p>
                @error('imagePost')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="titulo" class="h4 form-label">Titulo del Post</label>
                <input class="form-control" type="text" name="titulo" id="titulo" placeholder="Titulo del Post">
                @error('titulo')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="entrada" class="h4 form-label">Entrada del Post</label>
                <textarea class="form-control" name="entrada" id="entrada" cols="10" rows="2" placeholder="Escriba aqui la entrada principal del Post" required></textarea>
                @error('entrada')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="contenidoPost" class="h4 form-label">Contenido del Post</label>
                <textarea class="form-control" name="contenidoPost" id="contenidoPost" cols="30" rows="10" placeholder="Escriba aqui el contenido principal del Post" required></textarea>
                @error('contenidoPost')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="video" class="h4 form-label">Video post</label>
                <input class="form-control" type="file" accept="video/*" name="video"
                    id="video">
                    <p class="text-warning bg-dark rounded">Video sobre el post, que se mostrar?? cuando se visualize el post.</p>
                @error('video')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>


            <button type="submit" class="btn btn-info border-dark">Crear Post</button>
        </form>
    </div>
    <div class="container">
        <a href="{{ route('cursosposts.show', $Curso) }}"><button class="btn btn-primary mt-1 mb-5">Volver al Listado</button></a>
    </div>
@endsection
