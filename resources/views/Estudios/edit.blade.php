@extends('layout')

@section('titulo', 'Crear Estudios del Profesor')

@section('CSSadded')
    <link rel="stylesheet" href="{{ URL::asset('css/profesor/profesor_show.css') }}">
@endsection

@section('cuerpo')
    <div class="container py-5 text-center">

        <h1>Editar Nivel de Estudios</h1>

        <form action="{{ route('estudios.update', $estudio) }}" method="post">
            @method('PUT')

            @csrf

            <input required hidden type="text" name="user_id" id="user_id" value="{{ Auth::User()->id }}" required>

            <div class="mb-3">
                <label for=""></label>
                <select class="form-control" name="levels_id">
                    <option value="a" selected disabled>===Selecciona una Categoria de Estudios Disponible===</option>
                    @foreach ($levels as $level)
                        <option value="{{ $level->id }}" @if (isset($estudio)) {{ $estudio->levels_id == $level->id ? 'selected' : '' }} @endif>
                            {{ $level->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('levels_id')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nota" class="form-label">Nota final</label>
                <input class="form-control" type="number" name="nota" id="nota" placeholder="Nota final"
                    value="{{ old('nota') ?? @$estudio->nota }}">
                <p class="form-text">Nota final</p>
                @error('nota')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="fechaFinalizacion" class="form-label">Fecha finalizacion</label>
                <input type="date" data-date-format="DD MMMM YYYY" class="form-control" name="fechaFinalizacion"
                    id="fechaFinalizacion" value="{{ old('fechaFinalizacion') ?? @$estudio->fechaFinalizacion }}"
                    required>
            </div>
            @error('fechaFinalizacion')
                <p class="form-text text-danger">{{ $message }}</p>
            @enderror

            <button type="submit" class="btn btn-info border border-dark">Editar Nivel de Estudios</button>
        </form>
    </div>
    <div class="container">
        <a href="{{ route('estudios.index') }}"><button class="btn btn-primary mt-1 mb-5">Volver al Listado de Estudios</button></a>
    </div>
@endsection
