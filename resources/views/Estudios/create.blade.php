@extends('layout')

@section('titulo', 'Lista de Precios')

@section('CSSadded')
    <link rel="stylesheet" href="{{ URL::asset('css/profesor/profesor_show.css') }}">
@endsection

@section('cuerpo')
    <div class="container py-5 text-center">

        <h1>Crear Nivel de Estudios</h1>

        <form action="{{ route('estudios.store') }}" method="post">

            @csrf

            <input required hidden type="text" name="user_id" id="user_id" value="{{ Auth::User()->id }}" required>

            <div class="mb-3">
                <label for=""></label>
                <select class="form-control" name="levels_id">
                    <option value="a" selected disabled>===Selecciona un Nivel de Ingles===</option>
                    @foreach ($levels as $level)
                        <option value="{{ $level->id }}">
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
                <input class="form-control" type="number" name="nota" id="nota" placeholder="Nota final">
                <p class="form-text">Nota final</p>
                @error('nota')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="fechaFinalizacion" class="form-label">Fecha finalizacion</label>
                <input type="date" data-date-format="DD MMMM YYYY" class="form-control" name="fechaFinalizacion"
                    id="fechaFinalizacion" required>
                @error('fechaFinalizacion')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-info">Crear Nivel de Estudios</button>
        </form>
    </div>
    <div class="container">
        <a href="{{ route('estudios.index') }}"><button class="btn btn-primary mt-1 mb-5">Volver al Listado</button></a>
    </div>
@endsection
