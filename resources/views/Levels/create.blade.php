@extends('layout')

@section('titulo', 'Formulario Niveles')

@section('CSSadded')
    <link rel="stylesheet" href="{{ URL::asset('css/profesor/profesor_show.css') }}">
@endsection

@section('cuerpo')
    <div class="container py-5 text-center">


        <h1>Crear Nivel</h1>

        <form action="{{ route('levels.store') }}" method="post">

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

            <button type="submit" class="btn btn-info">Crear Nivel</button>
        </form>
    </div>
@endsection
