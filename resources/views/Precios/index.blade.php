@extends('layout')
@section('titulo', 'Precios del Profesor')

@section('CSSadded')
    <!--Añadir css de esta vista -->
    <link rel="stylesheet" href="{{ URL::asset('css/alumno/precios.css') }}">
@endsection

@section('cuerpo')

<div class="container py-5 pb-2">
    <h1 class="text-center">Listado de Precios</h1>
        <x-form-alerts/>

@if ($precios->count() < 3)
    <a href="{{ route('precios.create') }}" class="btn btn-success my-3">Crear Precio</a>
@endif

    <table class="table table-dark">
        <thead class="text-center">
            <th>Nombre del Pack</th>
            <th>Precio €</th>
            <th>Ventaja 1</th>
            <th>Ventaja 2</th>
            <th>Ventaja 3</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </thead>
        <tbody class="text-center">
            @forelse ($precios as $precio)
                <tr>
                    <th class="text-center">{{ $precio->nombrePack }}</th>
                    <th class="text-center">{{ $precio->precio }}</th>
                    <th class="text-center">{{ $precio->ventajaUno }}</th>
                    <th class="text-center">{{ $precio->ventajaDos }}</th>
                    <th class="text-center">{{ $precio->ventajaTres }}</th>
                    <th class="text-center">
                        <a href="{{ route('precios.edit', $precio) }}">
                            <button class="btn btn-success fas fa-edit fa-xl p-3"></button>
                        </a>

                    </th>
                    <th class="text-center">
                        <form action="{{ route('precios.destroy', $precio) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger fas fa-trash fa-xl p-3"></button>
                        </form>
                    </th>
                </tr>
            @empty
            <tr>
                <th colspan="7" class="text-center"><p class="h4 text-danger fw-bold m-5">No hay Precios Aun</p></th>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="container">
    <a href="{{ url('/') }}"><button class="btn btn-primary mt-1 mb-5">Volver al Inicio</button></a>
</div>

@endsection
@section('JSadded')
@endsection
