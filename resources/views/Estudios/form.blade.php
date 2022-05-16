@extends('layout')
@section('titulo', 'Formulario de Nivel de Estudios')
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
            <label for="nivel" class="form-label fw-bold">Nivel de Estudios:</label>
            @foreach ($niveles as $nivel)
                <div class="form-check form-check-inline">
                    <label class="form-check-label" for="nivel{{ $nivel->id }}">{{ $nivel->nombre }}</label>
                    <input class="form-check-input" type="radio" name="levels_id" id="{{ $nivel->id }}" value="{{ $nivel->id }}">
                </div>
            @endforeach
            <p class="form-text">Seleccione su nivel de estudios a crear</p>
            @error('nivel')
                <p class="form-text text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" type="number" name="nota" id="nota" min="1" max="10"
                placeholder="Nota con la que te graduaste" value="{{ old('nota') ?? @$level->nota }}">
            <label for="nota" class="form-label">Nota de Finalización</label>
            <p class="form-text">Escriba la Nota con la que te graduaste</p>
            @error('nota')
                <p class="form-text text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="d-flex row justify-content-center my-5">
            <label for="fechaFinalizacion" class="form-label">Fecha de finalización de estudios</label>
            <input type="date" class="date form-control"  name="fechaFinalizacion" style="width: 200px" value="{{ old('fechaFinalizacion') ?? @$level->fechaFinalizacion }}">
            <p class="form-text">Fecha de finalización de estudios</p>
            @error('fechaFinalizacion')
                <p class="form-text text-danger">{{ $message }}</p>
            @enderror
        </div>


        @if (isset($estudio))
            <button type="submit" class="btn btn-info">Editar Nivel de Estudios</button>
        @else
            <button type="submit" class="btn btn-info">Guardar Nivel de Estudios</button>
        @endif
        </form>
        <div class="container d-flex mt-5">
            <a href="{{ route('estudios.index') }}"><button class="btn btn-dark mt-1 mb-5">Cancelar</button></a>
        </div>
    </div>
@endsection
