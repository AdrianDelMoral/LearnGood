@extends('layout')

@section('titulo', 'Lista de Precios')

@section('CSSadded')
    <link rel="stylesheet" href="{{ URL::asset('css/profesor/profesor_show.css') }}">
@endsection

@section('cuerpo')
    {{-- Route::resource('precios', PriceController::class);  route('precios./index/create/update....') --}}
    <div class="container py-5 text-center">

        @if (isset($precio))
            <h1>Editar Precio</h1>
            @method('PUT')
        @else
            <h1>Crear Precio</h1>
        @endif

        @if (isset($precio))
            <form action="{{ route('precios.update', $precio) }}" method="post">
            @method('PUT')
        @else
            <form action="{{ route('precios.store') }}" method="post">
        @endif

            @csrf

            <input required hidden type="text" name="user_id" id="user_id" value="{{ Auth::User()->id }}" required>

            <div class="mb-3">
                <label for="nombrePack" class="form-label">Nombre del Pack</label>
                <input class="form-control" type="string" max="2" name="nombrePack" id="nombrePack" placeholder="Nombre del Pack"
                    value="{{ old('nombrePack') ?? @$precio->nombrePack }}">
                <p class="form-text">Escriba el nombre del Pack</p>
                @error('form')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio del Pack</label>
                <input class="form-control" type="number" name="precio" id="precio" placeholder="Precio del Pack" value="{{ old('precio') ?? @$precio->precio }}">
                <p class="form-text">Escriba el precio Pack</p>
                @error('precio')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ventajaUno" class="form-label">Ventaja 1</label>
                <input class="form-control" type="text" name="ventajaUno" id="ventajaUno" placeholder="Ventaja 1" value="{{ old('ventajaUno') ?? @$precio->ventajaUno }}">
                <p class="form-text">Escriba la Ventaja 1</p>
                @error('form')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ventajaDos" class="form-label">Ventaja 2</label>
                <input class="form-control" type="text" name="ventajaDos" id="ventajaDos" placeholder="Ventaja 2" value="{{ old('ventajaDos') ?? @$precio->ventajaDos }}">
                <p class="form-text">Escriba la Ventaja 2</p>
                @error('ventajaDos')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ventajaTres" class="form-label">Ventaja 3</label>
                <input class="form-control" type="text" name="ventajaTres" id="ventajaTres" placeholder="Ventaja 3" value="{{ old('ventajaTres') ?? @$precio->ventajaTres }}">
                <p class="form-text">Escriba la Ventaja 3</p>
                @error('ventajaTres')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            @if (isset($precio))
                <button type="submit" class="btn btn-info">Editar Precio</button>
            @else
                <button type="submit" class="btn btn-info">Guardar Precio</button>
            @endif
        </form>
    </div>
@endsection
