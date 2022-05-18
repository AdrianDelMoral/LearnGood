@extends('layout')

@section('titulo', 'Formulario Plataformas')

@section('CSSadded')
    <link rel="stylesheet" href="{{ URL::asset('css/profesor/profesor_show.css') }}">
@endsection

@section('cuerpo')
    <div class="container py-5 text-center">

        <h1>Crear Plataforma</h1>

        <form action="{{ route('platforms.store') }}" method="post" enctype="multipart/form-data">

        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre de la Plataforma</label>
            <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre de la Plataforma">
            <p class="form-text">Escriba el nombre de la Plataforma</p>
            @error('nombre')
                <p class="form-text text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="Foto" class="form-label">Foto de la Plataforma</label>
            <input class="form-control" type="file" accept="image/*" required name="platformImage" id="platformImage">
            <p class="form-text">Suba una imagen del icono de la plataforma(Formatos Admitidos: SVG)</p>

            @error('platformImage')
                <p class="form-text text-danger">{{ $message }}</p>
            @enderror
        </div>

            <button type="submit" class="btn btn-info border-dark">Crear Plataforma</button>
        </form>
    </div>
@endsection
