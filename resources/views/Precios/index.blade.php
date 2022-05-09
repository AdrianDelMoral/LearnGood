@extends('layout')
@section('titulo', 'Precios del Profesor')

@section('CSSadded') {{-- Añadir css de esta vista --}}
    <link rel="stylesheet" href="{{ URL::asset('css/alumno/precios_inicio.css') }}">
@endsection

@section('cuerpo')

    <div class="container">
        <span class="h1">Precios de: {{ Auth::user()->nombre }}</span>
        <table class="table table-dark table-bordered border-light">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Horas</th>
                    <th scope="col">Cantidad €</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @if (!$precios)
                    <tr>
                        <th scope="row">1</th>
                        <td>5</td>
                        <td>30€</td>
                        <td><span class="fas fa-edit"></span></td>
                        <td><span class="fas fa-delete"></span></td>
                    </tr>
                @else
                    <tr>
                        <td colspan="2" class="h4 text-center py-4">No hay datos</td>
                        <td colspan="2" class="h4 text-center py-4">
                            <a href="{{ route('precios.create') }}">
                                <button class="btn btn-success">Añadir precios</button>
                            </a>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
        <a href="/"><button class="btn btn-primary">volver a atrás</button></a>
    </div>
@endsection
