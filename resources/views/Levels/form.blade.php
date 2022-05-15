@extends('layout')

@section('titulo', 'Formulario Niveles')

@section('CSSadded')
    <link rel="stylesheet" href="{{ URL::asset('css/profesor/profesor_show.css') }}">
@endsection

@section('cuerpo')
    <div class="container py-5 text-center">

        @if (isset($level))
            <h1>Editar Nivel</h1>
            @method('PUT')
        @else
            <h1>Crear Nivel</h1>
        @endif

        @if (isset($level))
            <form action="{{ route('levels.update', $level) }}" method="post">
                @method('PUT')
            @else
                <form action="{{ route('levels.store') }}" method="post">
        @endif

        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Nivel de Ingles</label>
            <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre del Nivel de Ingles"
                value="{{ old('nombre') ?? @$level->nombre }}">
            <p class="form-text">Escriba el nombre del Nivel de Ingles</p>
            @error('nombre')
                <p class="form-text text-danger">{{ $message }}</p>
            @enderror
        </div>

        @if (isset($level))
            <button type="submit" class="btn btn-info">Editar Nivel</button>
        @else
            <button type="submit" class="btn btn-info">Guardar Nivel</button>
        @endif
        </form>
    </div>
@endsection
