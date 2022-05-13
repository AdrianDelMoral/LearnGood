@extends('layout')
@section('titulo', 'Precios del Profesor')

@section('CSSadded')
    <!--Añadir css de esta vista -->
    <link rel="stylesheet" href="{{ URL::asset('css/alumno/precios.css') }}">
@endsection

@section('cuerpo')

<div class="container py-5">
    <h1 class="text-center">Listado de Precios</h1>
    @if(Session::has('createMsj'))
        <div class="alert alert-success h5">
            {{ Session::get('createMsj') }}
        </div>
    @endif

    @if(Session::has('updateMsj'))
    <div class="alert alert-warning h5">
        {{ Session::get('updateMsj') }}
    </div>
    @endif

    @if(Session::has('errorMsj'))
        <div class="alert alert-danger h5">
            {{ Session::get('errorMsj') }}
        </div>
    @endif

@if ($precios->count() < 3)
    <a href="{{ route('precios.create') }}" class="btn btn-primary">Crear Precio</a>
@endif

    <table class="table table-dark">
        <thead>
            <th>Nombre del Pack</th>
            <th>Precio €</th>
            <th>Ventaja 1</th>
            <th>Ventaja 2</th>
            <th>Ventaja 3</th>
            <th>Opciones</th>
        </thead>
        <tbody>
            @forelse ($precios as $precio)
                <tr>
                    <th>{{ $precio->nombrePack }}</th>
                    <th>{{ $precio->precio }}</th>
                    <th>{{ $precio->ventajaUno }}</th>
                    <th>{{ $precio->ventajaDos }}</th>
                    <th>{{ $precio->ventajaTres }}</th>
                    <th>
                        <a href="{{ route('precios.edit', $precio) }}">
                            <button class="btn btn-success fas fa-edit fa-xl p-3"></button>
                        </a>

                        <form action="{{ route('precios.destroy', $precio) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger fas fa-trash fa-xl p-3"></button>
                        </form>
                    </th>
                </tr>
            @empty
            <tr>
                <th colspan="7">No hay Precios aun</th>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
@section('JSadded')
@endsection
