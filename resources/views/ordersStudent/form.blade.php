@extends('layout')

@section('titulo', 'Lista de Precios')

@section('CSSadded')
    <link rel="stylesheet" href="{{ URL::asset('css/profesor/profesor_show.css') }}">
@endsection

@section('cuerpo')
    <div class="container py-5 text-center">

        @if (isset($order))
            <h1>Editar Pedido</h1>
            @method('PUT')
        @else
            <h1>Crear Pedido</h1>
        @endif

        @if (isset($order))
            <form action="{{ route('ordersStudent.update', $order) }}" method="post">
                @method('PUT')
        @else
            <form action="{{ route('ordersStudent.store') }}" method="post">
        @endif
        @csrf
        {{--
            El que crea el pedido es el alumno asi que será el que pueda
            editar el pedido para que siga en user_id enlazado a el,
            mientras que mediante el precio, sacaré el profesor
        --}}
        <input required hidden type="number" name="user_id_alumno" id="user_id_alumno" value="{{ Auth::User()->id }}" required>

        <div class="mb-3">
            <select class="form-control" name="prices_id">
                <option value="a" selected disabled>===Selecciona un Precio del Profesor===</option>
                @foreach ($prices as $price)
                    @if ($price)
                        <option value="{{ $price->id }}" @if(isset($order)) {{ $order->prices_id == $price->id ? 'selected' : '' }}@endif>
                            {{ $price->precio }} € - Pack: {{ $price->nombrePack }}
                        </option>
                    @endif
                @endforeach
            </select>
        </div>

        {{-- Estado de pago en el controlador se pondrá por defecto a 0 ya que aun no ha sido realizada la clase con el profesor --}}

        @if (isset($order))
            <button type="submit" class="btn btn-info">Editar Pedido</button>
        @else
            <button type="submit" class="btn btn-info">Crear Pedido</button>
        @endif
        </form>
    </div>
    <div class="container">
        <a href="{{ route('ordersStudent.index') }}">
            <button class="btn btn-primary mt-1 mb-5">Volver al Listado</button>
        </a>
    </div>
@endsection
