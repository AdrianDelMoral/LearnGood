@extends('layout')

@section('titulo', 'Formulario Plataformas')

@section('CSSadded')
    <link rel="stylesheet" href="{{ URL::asset('css/profesor/profesor_show.css') }}">
@endsection

@section('cuerpo')
    <div class="container py-5 text-center">

        <h1>Actualizar Usuario</h1>
        {{ $id }}
        <form action="{{ route('manageusers.update', $id) }}" method="post">
            @method('PUT')

            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre"
                    value="{{ old('nombre') ?? @$id->nombre }}">
                @error('nombre')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input class="form-control" type="text" name="apellidos" id="apellidos" placeholder="Nombre"
                    value="{{ old('apellidos') ?? @$id->apellidos }}">
                @error('apellidos')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-info border-dark">Editar Plataforma</button>
        </form>
    </div>
    <div class="container">
        <a href="{{ route('manageusers.index') }}"><button class="btn btn-primary mt-1 mb-5">Volver al Listado</button></a>
    </div>
@endsection
