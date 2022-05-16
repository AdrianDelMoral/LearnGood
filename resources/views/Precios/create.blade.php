@extends('layout')

@section('titulo', 'Lista de Precios')

@section('CSSadded')
    <link rel="stylesheet" href="{{ URL::asset('css/profesor/profesor_show.css') }}">
@endsection

@section('cuerpo')
    {{-- Route::resource('precios', PriceController::class);  route('precios./index/create/update....') --}}
    <div class="container py-5 text-center">

        <h1>Crear Precio</h1>

        <form action="{{ route('precios.store') }}" method="post">

            @csrf

            <input required hidden type="text" name="user_id" id="user_id" value="{{ Auth::User()->id }}" required>

            <div class="mb-3">
                <label for="nombrePack" class="form-label">Nombre del Pack</label>
                <input class="form-control" type="string" name="nombrePack" id="nombrePack" placeholder="Nombre del Pack">
                <p class="form-text">Escriba el nombre del Pack</p>
                @error('nombrePack')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio del Pack</label>
                <input class="form-control" type="number" name="precio" id="precio" placeholder="Precio del Pack"">
                    <p class=" form-text">Escriba el precio Pack</p>
                @error('precio')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ventajaUno" class="form-label">Ventaja 1</label>
                <input class="form-control" type="text" name="ventajaUno" id="ventajaUno" placeholder="Ventaja 1"">
                    <p class=" form-text">Escriba la Ventaja 1</p>
                @error('ventajaUno')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ventajaDos" class="form-label">Ventaja 2</label>
                <input class="form-control" type="text" name="ventajaDos" id="ventajaDos" placeholder="Ventaja 2"">
                    <p class=" form-text">Escriba la Ventaja 2</p>
                @error('ventajaDos')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ventajaTres" class="form-label">Ventaja 3</label>
                <input class="form-control" type="text" name="ventajaTres" id="ventajaTres" placeholder="Ventaja 3"">
                    <p class=" form-text">Escriba la Ventaja 3</p>
                @error('ventajaTres')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-info">Guardar Precio</button>
        </form>
    </div>
@endsection
