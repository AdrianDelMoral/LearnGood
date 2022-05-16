@extends('layout')

@section('titulo', 'Lista de Precios')

@section('CSSadded')
    <link rel="stylesheet" href="{{ URL::asset('css/profesor/profesor_show.css') }}">
@endsection

@section('cuerpo')
    {{-- Route::resource('precios', PriceController::class);  route('precios./index/create/update....') --}}
    <div class="container py-5 text-center">

        @if (isset($estudio))
            <h1>Editar Nivel de Estudios</h1>
            @method('PUT')
        @else
            <h1>Crear Nivel de Estudios</h1>
        @endif

        @if (isset($estudio))
            <form action="{{ route('estudios.update', $estudio) }}" method="post">
                @method('PUT')
            @else
                <form action="{{ route('estudios.store') }}" method="post">
        @endif

        @csrf

        <input required hidden type="text" name="user_id" id="user_id" value="{{ Auth::User()->id }}" required>

        <div class="mb-3">
            <label for=""></label>
            <select class="form-control" name="levels_id">
                <option value="a" selected disabled>===Selecciona un Nivel de Ingles===</option>
                @foreach ($levels as $level)
                    <option value="{{ $level->id }}" @if(isset($estudio)) {{ $estudio->levels_id == $level->id ? 'selected' : '' }}@endif>
                        {{ $level->nombre }}
                    </option>
                @endforeach
            </select>
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
            <input type="date" data-date-format="DD MMMM YYYY" class="form-control" name="fechaFinalizacion" id="fechaFinalizacion"
                value="{{ old('fechaFinalizacion') ?? @$estudio->fechaFinalizacion }}" required>
        </div>

        @if (isset($estudio))
            <button type="submit" class="btn btn-info">Editar Nivel de Estudios</button>
        @else
            <button type="submit" class="btn btn-info">Guardar Nivel de Estudios</button>
        @endif
        </form>
    </div>
    <div class="container">
        <a href="{{ route('estudios.index') }}"><button class="btn btn-primary mt-1 mb-5">Volver al Listado</button></a>
    </div>
@endsection
