@extends('layout')

@section('titulo', 'Formulario Plataformas')

@section('CSSadded')
    <link rel="stylesheet" href="{{ URL::asset('css/profesor/profesor_show.css') }}">
@endsection

@section('cuerpo')
    <div class="container py-5 text-center">

        <h1>Actualizar Usuario</h1>
        @foreach ($id as $item)
        @endforeach
        <form action="{{ route('manageusers.update', $id) }}" method="post">
            @method('PUT')

            @csrf

            <input class="form-control" readonly="readonly" hidden type="number" name="id" id="id"
                value="{{ old('id') ?? @$id->id }}">
            <input class="form-control" readonly="readonly" hidden type="text" name="role_id" id="role_id" value="{{ old('role_id') ?? @$id->role_id }}">


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
                <input class="form-control" type="text" name="apellidos" id="apellidos" placeholder="Apellidos"
                    value="{{ old('apellidos') ?? @$id->apellidos }}">
                @error('apellidos')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            @if ($id->role_id == 'Profesor' || $id->role_id == 'Admin')
                <div class="mb-3">
                    <label for="idioma" class="form-label">Idioma</label>
                    <input class="form-control" type="text" name="idioma" id="idioma" placeholder="Idioma"
                        value="{{ old('idioma') ?? @$id->idioma }}">
                    @error('idioma')
                        <p class="form-text text-danger">{{ $message }}</p>
                    @enderror
                </div>
            @endif

            @if ($id->role_id == 'Profesor' || $id->role_id == 'Admin')
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripcion</label>
                    <input class="form-control" type="text" name="descripcion" id="descripcion" placeholder="Descripcion"
                        value="{{ old('descripcion') ?? @$id->descripcion }}">
                    @error('descripcion')
                        <p class="form-text text-danger">{{ $message }}</p>
                    @enderror
                </div>
            @endif

            <button type="submit" class="btn btn-info border-dark">Editar Usuario</button>
        </form>
    </div>
    <div class="container">
        <a href="{{ route('manageusers.index') }}"><button class="btn btn-primary mt-1 mb-5">Volver al
                Listado</button></a>
    </div>
@endsection
