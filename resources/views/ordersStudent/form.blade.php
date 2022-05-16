@extends('layout')

@section('titulo', 'Lista de Precios')

@section('CSSadded')
    <link rel="stylesheet" href="{{ URL::asset('css/profesor/profesor_show.css') }}">
@endsection

@section('cuerpo')
    {{-- Route::resource('precios', PriceController::class);  route('precios./index/create/update....') --}}
    <div class="container py-5 text-center">

        @if (isset($estudio))
            <h1>Editar Pedido</h1>
            @method('PUT')
        @else
            <h1>Crear Pedido</h1>
        @endif

        @if (isset($order))
            <form action="{{ route('ordersTeacher.update', $order) }}" method="post">
                @method('PUT')
            @else
                <form action="{{ route('ordersTeacher.store') }}" method="post">
        @endif

        @csrf

        <input required hidden type="text" name="user_id" id="user_id" value="{{ Auth::User()->id }}" required>

        <div class="mb-3">
            <select class="form-control" name="platform_id">
                <option value="a" selected disabled>===Selecciona un Precio del Profesor===</option>
                {{-- <p>{{ $user->prices }}</p> --}}
                @foreach ($prices as $price)
                    <option value="{{ $price->id }}" @if(isset($order)) {{ $estudio->prices_id == $price->id ? 'selected' : '' }}@endif>
                        {{ $price->nombre }}
                    </option>
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
        <a href="{{ route('ordersTeacher.index') }}"><button class="btn btn-primary mt-1 mb-5">Volver al Listado</button></a>
    </div>
@endsection
