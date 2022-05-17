@extends('layout')

@section('titulo', 'Lista de Precios')

@section('CSSadded')
    <link rel="stylesheet" href="{{ URL::asset('css/profesor/profesor_show.css') }}">
@endsection

@section('cuerpo')
    <div class="container py-5 text-center">

        @if (isset($ordersstudent))
            <h1>Editar Pedido</h1>
            @method('PUT')
        @else
            <h1>Crear Pedido</h1>
        @endif

        @if (isset($ordersstudent))
            <form action="{{ route('ordersstudent.update', $ordersstudent) }}" method="post">
                @method('PUT')
        @else
            <form action="{{ route('ordersstudent.store') }}" method="post">
        @endif
        @csrf
        {{--
            El que crea el pedido es el alumno asi que será el que pueda
            editar el pedido para que siga en user_id enlazado a el,
            mientras que mediante el precio, sacaré el profesor
        --}}

        <input required hidden type="number" name="user_id_alumno" id="user_id_alumno" value="{{ Auth::User()->id }}" required>

        <div class="mb-3">
            <select class="form-control" name="courses_id">
                <option value="a" selected disabled>===Selecciona un Precio del Profesor===</option>
                @foreach ($ordersstudent->courses as $course)
                    <option value="{{ $course->id }}" @if(isset($ordersstudent->course)) {{ $course->id ? 'selected' : '' }}@endif>
                        {{ $course->precio }} € - Pack: {{ $course->nombrePack }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Estado de pago en el controlador se pondrá por defecto a 0 ya que aun no ha sido realizada la clase con el profesor --}}

        @if (isset($ordersstudent))
            <button type="submit" class="btn btn-info">Editar Pedido</button>
        @else
            <button type="submit" class="btn btn-info">Crear Pedido</button>
        @endif
        </form>
    </div>
    <div class="container">
        <a href="{{ route('ordersstudent.index') }}">
            <button class="btn btn-primary mt-1 mb-5">Volver al Listado</button>
        </a>
    </div>
@endsection
