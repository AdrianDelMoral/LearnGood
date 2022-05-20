@extends('layout')

@section('titulo', 'Listado de Cursos')

@section('CSSadded')
    <link rel="stylesheet" href="{{ URL::asset('css/profesor/profesor_show.css') }}">
@endsection

@section('cuerpo')
    @if (Auth::user()->role_id == 'Profesor')
        <div class="d-flex justify-content-end">

            <div class="d-flex justify-content-end">
                <button class="m-4 btn btn-success">Boton para editar</button>
            </div>

            <div class="d-flex justify-content-end">
                <button class="m-4 btn btn-danger">Boton para Eliminar</button>
            </div>
        </div>
    @endif

    {{-- Dentro del bucle en cada tarjeta del post --}}
    @foreach ($post as $infoPost)
        {{ $infoPost }}
    @endforeach
    {{-- Dentro del bucle en cada tarjeta del post --}}

@endsection
