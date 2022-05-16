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
                <label for="nombrePack" class="form-label">Nombre del Pack</label>
                <input class="form-control" type="text" name="nombrePack" id="nombrePack" placeholder="Nombre del Pack"
                    value="{{ old('nombrePack') ?? @$estudio->nivel }}">
                <p class="form-text">Escriba el nombre del Pack</p>
                @error('form')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            @if (isset($estudio))
                <button type="submit" class="btn btn-info">Editar Nivel de Estudios</button>
            @else
                <button type="submit" class="btn btn-info">Guardar Nivel de Estudios</button>
            @endif
        </form>
    </div>
@endsection
