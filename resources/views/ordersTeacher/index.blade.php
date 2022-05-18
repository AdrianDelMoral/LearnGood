@extends('layout')
@section('titulo', 'Precios del Profesor')

@section('CSSadded')
    <!--Añadir css de esta vista -->
    <link rel="stylesheet" href="{{ URL::asset('css/alumno/estudios.css') }}">
@endsection

@section('cuerpo')

<div class="container py-5 pb-2">
    <h1 class="text-center">Listado de Pedidos de {{ Auth::user()->nombre }}</h1>
        <x-form-alerts/>

    <table class="table table-bordered border-warning bg-dark text-light">
        <thead class="text-center">
            <th class="text-center fw-bold text-warning">Numero de Pedido</th>
            <th class="text-center fw-bold text-warning">Precio</th>
            <th class="text-center fw-bold text-warning">Nombre del Profesor</th>
            <th class="text-center fw-bold text-warning">Nombre del Alumno</th>
            <th class="text-center fw-bold text-warning">Estado de Pago</th>
            <th class="text-center fw-bold text-warning">Editar</th>
            <th class="text-center fw-bold text-warning">Eliminar</th>
        </thead>
        <tbody class="text-center">


            @forelse ($ordersTeacher as $order)

                {{-- <div class="bg-dark text-light m-5 p-3">
                    {{ $order->getProfesor }}
                </div> --}}
                <tr>
                    <th class="text-center text-light">{{ $order->id }}</th>

                    <th class="text-center text-light">{{ $order->cursoModel->precio }}</th>
                    <th class="text-center text-light">{{ $order->getProfesor->nombre }} {{ $order->getProfesor->apellidos }}</th>
                    <th class="text-center text-light">{{ $order->getAlumno->nombre }} {{ $order->getAlumno->apellidos }}</th>
                    <th class="text-center text-light">
                        @if(!$order->status)
                            <button class="rounded-pill border-danger bg-dark px-4 py-2 fw-bold text-danger">Por Realizar</button>
                        @else
                            <button class="rounded-pill border-success bg-dark px-4 py-2 fw-bold text-success">Por Realizar</button>
                        @endif
                    </th>
                    <th class="text-center text-light">
                        <a href="{{ route('ordersteacher.edit', $order->id) }}">
                            <button class="btn btn-success fas fa-edit fa-xl p-3"></button>
                        </a>
                    </th>
                    <th class="text-center">
                        <form action="{{ route('ordersteacher.destroy', $order) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger fas fa-trash fa-xl p-3"></button>
                        </form>
                    </th>
                </tr>
            @empty
                <tr>
                    <th colspan="7" class="text-center"><p class="h4 text-danger fw-bold m-5">No se le han solicitado Servicios Actualmente</p></th>
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
