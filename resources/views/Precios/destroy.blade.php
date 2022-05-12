@extends('layout')

@section('titulo', 'Página Principal')

@section('CSSadded')
    <link rel="stylesheet" href="{{ URL::asset('css/profesor/profesor_show.css') }}">
@endsection

@section('cuerpo')
<div class="col">
    <div class="card text-white bg-dark rounded-5 font-monospace">
        <div class="d-flex flex-column h-100 p-5">
            <div class="d-flex justify-content-evenly align-items-center">
                <span class="h1 fw-bold text-danger text-decoration-underline">Nº {{ $precio->id }}</span>
                <span class="h3">- Precio: {{ $precio->precio }}€</span>
            </div>
            <div class="d-flex row text-left my-4">
                <span class="h3">Ventajas:</span>
                <div class="ms-3">
                    <ul class="fw-bold">
                        <li type="1" class="ps-2 h5">{{ $precio->ventajaUno }} </li>
                        <li type="1" class="ps-2 h5">{{ $precio->ventajaDos }}</li>
                        <li type="1" class="ps-2 h5">{{ $precio->ventajaTres }}</li>
                    </ul>
                </div>
            </div>
            <div class="d-flex justify-content-evenly">
                <form action="{{route('precios.destroy', $precio->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <a href="" class="btn btn-danger mt-4 px-5">
                        <input type="submit" value="eliminar" class="fas fa-trash">
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
