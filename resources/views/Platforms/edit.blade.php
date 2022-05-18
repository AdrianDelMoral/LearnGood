@extends('layout')

@section('titulo', 'Formulario Plataformas')

@section('CSSadded')
    <link rel="stylesheet" href="{{ URL::asset('css/profesor/profesor_show.css') }}">
@endsection

@section('cuerpo')
    <div class="container py-5 text-center">

        <h1>Editar Plataforma</h1>

        <form action="{{ route('platforms.update', $platform) }}" method="post" enctype="multipart/form-data">
            @method('PUT')

            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre de la Plataforma</label>
                <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre de la Plataforma"
                    value="{{ old('nombre') ?? @$platform->nombre }}">
                <p class="form-text">Escriba el nombre de la Plataforma</p>
                @error('nombre')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="platformURL" class="form-label">URL de la plataforma</label>
                <input class="form-control" type="platformURL" name="platformURL" id="platformURL" value="{{ old('platformURL') ?? @$platform->platformURL }}" required>
                @error('platformURL')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="Foto" class="form-label">Foto de la Plataforma</label>
                <input class="form-control" type="file" accept="image/svg" name="platformImage" id="platformImage"
                    value="{{ old('platformImage') ?? @$platform->platformImage }}">
                    <p class="h6 mt-5 fw-bold">Imagen Antes de Actualizar de la plataforma:</p>
                    @if (isset($platform))
                        <img class="h-8 w-8 rounded-full object-cover" style="width: 7rem;heigth: 7rem;" src="{{ asset('imagenes/platformImages/'.$platform->platformImage) }}">
                    @endif
                @error('platformImage')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-info border border-dark">Editar Plataforma</button>
        </form>
    </div>
    <div class="container">
        <a href="{{ route('platforms.index') }}"><button class="btn btn-primary mt-1 mb-5">Volver al Listado</button></a>
    </div>
@endsection
