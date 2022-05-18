@extends('layout')
@section('titulo', 'Precios del Profesor')

@section('CSSadded')
    <!--Añadir css de esta vista -->
    <link rel="stylesheet" href="{{ URL::asset('css/alumno/estudios.css') }}">
@endsection

@section('cuerpo')

    <div class="container py-5 pb-2">
        <h1 class="text-center">Listado de Pedidos de {{ Auth::user()->nombre }} <span class="mx-5"></span> <em
                class="fw-bold text-warning">{{ Auth::user()->role_id }}</em></h1>
        <x-form-alerts />

        <table class="table table-bordered border-warning bg-dark text-light">
            <thead class="text-center">
                <th class="text-center fw-bold text-warning">Numero de Pedido</th>
                <th class="text-center fw-bold text-warning">Precio</th>
                <th class="text-center fw-bold text-warning">Profesor</th>
                <th class="text-center fw-bold text-warning">Posts del Curso</th>
                <th class="text-center fw-bold text-warning">Estado del pago</th>
                <th class="text-center fw-bold text-warning">Eliminar</th>
            </thead>
            <tbody class="text-center">
                @forelse ($ordersStudent as $order)
                    <tr>
                        <th class="text-center text-light">{{ $order->id }}</th>
                        <th class="text-center text-light">{{ $order->cursoModel->precio }} €</th>
                        <th class="text-center text-light">{{ $order->getProfesor->nombre }}
                            {{ $order->getProfesor->apellidos }}</th>
                        <th class="text-center text-light">
                            <a href="{{ route('posts.postsCurso', $order->cursoModel->id) }}">
                                <button class="btn btn-secondary fas fa-eye fa-xl p-3"></button>
                            </a>
                        </th>
                        <th class="text-center text-light">
                            @if ($order->status == false)
                                <button class="rounded-pill border-danger bg-dark px-4 py-2 fw-bold text-danger">Por
                                    Realizar</button>
                            @else
                                <button
                                    class="rounded-pill border-success bg-dark px-4 py-2 fw-bold text-success">Pagado</button>
                            @endif
                        </th>
                        <th class="text-center">
                            <form action="{{ route('ordersstudent.destroy', $order) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger fa-regular fa-circle-xmark fa-xl p-3"></button>
                            </form>
                        </th>
                    </tr>
                @empty
                    <tr>
                        <th colspan="7" class="text-center">
                            <p class="h4 text-danger fw-bold m-5">No se le han solicitado Servicios Actualmente</p>
                        </th>
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
