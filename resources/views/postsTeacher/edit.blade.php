@extends('layout')

@section('titulo', 'Formulario Plataformas')

@section('CSSadded')
    <link rel="stylesheet" href="{{ URL::asset('css/profesor/posts.css') }}">
@endsection

@section('cuerpo')
    <div class="container py-5 text-center">

        <h1><u>Editar Post</u></h1>
        <form action="{{ route('cursosposts.update', $post) }}" method="post" enctype="multipart/form-data">
            @method('PUT')

            @csrf
            <input required hidden type="number" name="courses_id" id="courses_id" value="{{ $post->courses_id }}" required>

            <div class="mb-3">
                <label for="imagePost" class="h4 form-label">Portada del Post</label>
                <input class="form-control" type="file" accept="image/*" name="imagePost" id="imagePost">
                <p class="h6 mt-5 fw-bold">Imagen Antes de Actualizar del Post:</p>
                @if (isset($post->postImage))
                    <img class="h-8 w-8 rounded-full object-cover" style="width: 7rem;heigth: 7rem;"
                        src="{{ asset('imagenes/postImages/' . $post->postImage) }}">
                @endif
                @error('imagePost')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="titulo" class="h4 form-label">Titulo del Post</label>
                <input class="form-control" type="text" name="titulo" id="titulo" placeholder="Titulo del Post" value="{{ $post->titulo }}">
                @error('titulo')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="entrada" class="h4 form-label">Entrada del Post</label>
                <textarea class="form-control" name="entrada" id="entrada" cols="10" rows="2"
                    placeholder="Escriba aqui la entrada principal del Post" required>{{ $post->entrada }}</textarea>
                @error('entrada')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="contenidoPost" class="h4 form-label">Contenido del Post</label>
                <textarea class="form-control" name="contenidoPost" id="contenidoPost" cols="30" rows="10"
                    placeholder="Escriba aqui el contenido principal del Post" required>{{ $post->contenidoPost }}</textarea>
                @error('contenidoPost')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="video" class="h4 form-label">Video post</label>
                <input class="form-control" type="file" accept="video/*" name="video" id="video">
                <p class="text-warning bg-dark rounded">Video sobre el post, que se mostrará cuando se visualize el post.
                </p>
                @if (isset($post->video))
                    <img class="h-8 w-8 rounded-full object-cover" style="width: 7rem;heigth: 7rem;"
                        src="{{ asset('imagenes/postImages/' . $post->postImage) }}">
                @endif
                @error('video')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>


            <button type="submit" class="btn btn-info border-dark">Editar Post</button>
        </form>
    </div>
    <div class="container">
        <a href="{{ route('cursosposts.show', $post->courses_id) }}"><button class="btn btn-primary mt-1 mb-5">Volver al Listado</button></a>
    </div>
@endsection
