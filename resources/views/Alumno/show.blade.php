@extends('alumno_layout')
@section('titulo', 'Editar información')

@section('CSSadded') {{-- Añadir css de esta vista --}}
    <link rel="stylesheet" href="{{ URL::asset('css/alumno/alumno_show.css') }}">
@endsection

@section('cuerpo')
    {{-- <section class="row justify-content-center mLogin">
        <article class="col-md-6">
            <h1 class="text-center my-5">Información del usuario</h1>

            <div class="row justify-content-center">
                <div class="col-md-6">
                Aqui la info
                </div>
            </div>
        </article>
    </section> --}}

    <h1>ver solicitudes efectuadas</h1>
@endsection
