@extends('layout')

@section('titulo', 'Lista de Precios')

@section('CSSadded')
    <link rel="stylesheet" href="{{ URL::asset('css/profesor/profesor_show.css') }}">
@endsection

@section('cuerpo')
    <div class="container py-5 text-center">

        <h1>Crear Pedido</h1>

        <form action="{{ route('ordersstudent.store') }}" method="post">
            @csrf
            {{-- El que crea el pedido es el alumno asi que será el que pueda
            editar el pedido para que siga en user_id enlazado a el,
            mientras que mediante el precio, sacaré el profesor --}}


            <input required hidden type="number" name="user_id_profesor" id="user_id_profesor" value="{{ $datosPedido->studies->infoProfe->id }}" required>

            <input hidden required type="number" id="courses_id" name="courses_id" value="{{ $datosPedido->id }}">

            <div class="mb-3">
                <span class="text-light bg-dark border-warning fw-bold form-control">
                    Precio a pagar:
                    {{ $datosPedido->precio }} €
                </span>
                <input class="form-control" type="number" hidden name="courses_id" value="{{ $datosPedido->id }}">
            </div>


            <div class="mb-3 text-dark bg-warning border-dark fw-bold form-control">
                    <p class=" text-dark fw-bold ">Estado del pedido actualmente:</p>
                    <p><i class="text-danger fa-xl fa-solid fa-triangle-exclamation"></i> POR PAGAR <i class="text-danger fa-xl fa-solid fa-triangle-exclamation"></i></p>
                    <p><em>Contacte con su profesor para realizar el pago y pueda activarle el curso</em></p>
                    <input class="form-control" type="number" hidden name="status" value="0">
            </div>

            {{-- Estado de pago en el controlador se pondrá por defecto a 0 ya que aun no ha sido realizada la clase con el profesor --}}

            <button type="submit" class="btn btn-info border-dark">Crear Pedido</button>
        </form>
    </div>
    <div class="container">
        <a href="{{ route('alumnoviews.index') }}">
            <button class="btn btn-primary mt-1 mb-5">Volver al Listado</button>
        </a>
    </div>
@endsection
