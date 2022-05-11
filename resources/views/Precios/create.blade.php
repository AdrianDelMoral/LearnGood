@extends('layout')
@section('titulo', 'Añadir un precio nuevo')

@section('CSSadded') {{-- Añadir css de esta vista --}}
    <link rel="stylesheet" href="{{ URL::asset('css/alumno/precios_create.css') }}">
@endsection

@section('cuerpo')
    <div class="container">
        <div>
            <h1 class="fw-bold text-center">Añadir un nuevo Precio</h1>
        </div>

        <form action="{{route('precios.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label class="labels" for="precio">Precio</label>
                <input type="number" class="form-control" name="precio" id="precio" aria-describedby="precioHelp"
                    placeholder="Precio €">
            </div>

            <div class="form-group">
                <label for="horas">Horas</label>
                <input type="number" class="form-control" name="horas" id="horas" placeholder="Horas">
            </div>

            <button class="btn btn-success">Añadir Precio</button>
        </form>
    </div>
    </div>
@endsection
