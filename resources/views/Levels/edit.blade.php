@extends('layout')

@section('titulo', 'Formulario Categoria')

@section('CSSadded')
    <link rel="stylesheet" href="{{ URL::asset('css/profesor/profesor_show.css') }}">
@endsection

@section('cuerpo')
    <div class="container py-5 text-center">

        <h1>Editar Categoria</h1>

        <form action="{{ route('levels.update', $level) }}" method="post">
            @method('PUT')

            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre de la Categoria</label>
                <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre de la Categoria"
                    value="{{ old('nombre') ?? @$level->nombre }}">
                @error('nombre')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-info border-dark">Editar Categoria</button>
        </form>
    </div>
@endsection
