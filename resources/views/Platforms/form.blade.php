@extends('layout')

@section('titulo', 'Formulario Plataformas')

@section('CSSadded')
    <link rel="stylesheet" href="{{ URL::asset('css/profesor/profesor_show.css') }}">
@endsection

@section('cuerpo')
    <div class="container py-5 text-center">

        @if (isset($platform))
            <h1>Editar Plataforma</h1>
            @method('PUT')
        @else
            <h1>Crear Plataforma</h1>
        @endif

        @if (isset($platform))
            <form action="{{ route('platforms.update', $platform) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
            @else
                <form action="{{ route('platforms.store') }}" method="post" enctype="multipart/form-data">
        @endif

        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre de la Plataforma</label>
            <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre de la Plataforma"
                value="{{ old('nombre') ?? @$platform->nombre }}">
            <p class="form-text">Escriba el nombre de la Plataforma</p>
            @error('form')
                <p class="form-text text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="Foto" class="form-label">Foto de la Plataforma</label>
            <input class="form-control" type="file" accept="image/svg" required name="platformImage" id="platformImage" value="{{ old('platformImage') ?? @$platform->platformImage }}">
            <p class="form-text">Suba una imagen del icono de la plataforma(Formatos Admitidos: SVG)</p>
            @if (isset($platform))
                {{ $platform->platformImage }}
            @endif
            @error('platformImage')
                <p class="form-text text-danger">{{ $message }}</p>
            @enderror
        </div>

        @if (isset($platform))
            <button type="submit" class="btn btn-info">Editar Plataforma</button>
        @else
            <button type="submit" class="btn btn-info">Guardar Plataforma</button>
        @endif
        </form>
    </div>
    <div class="container">
        <a href="{{ route('platforms.index') }}"><button class="btn btn-primary mt-1 mb-5">Volver al Listado</button></a>
    </div>
@endsection
