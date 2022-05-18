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

            <input required hidden type="number" name="user_id_alumno" id="user_id_alumno" value="{{ Auth::User()->id }}"
                required>

            <div class="mb-3">
                <select class="form-control" name="courses_id" required>
                    <option value="a" selected disabled>===Selecciona un Precio del Profesor===</option>
                    @foreach ($ordersstudent->courses as $course)
                        <option value="{{ $course->id }}"
                            @if (isset($ordersstudent->course)) {{ $course->id ? 'selected' : '' }} @endif>
                            {{ $course->precio }} € - Pack: {{ $course->nombreCurso }}
                        </option>
                    @endforeach
                </select>
                @error('courses_id')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            {{-- Estado de pago en el controlador se pondrá por defecto a 0 ya que aun no ha sido realizada la clase con el profesor --}}

            <button type="submit" class="btn btn-info border border-dark">Crear Pedido</button>
        </form>
    </div>
    <div class="container">
        <a href="{{ route('ordersstudent.index') }}">
            <button class="btn btn-primary mt-1 mb-5">Volver al Listado de Pedidos</button>
        </a>
    </div>
@endsection
