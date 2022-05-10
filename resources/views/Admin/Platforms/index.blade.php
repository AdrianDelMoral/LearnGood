@extends('layout')
@section('titulo', 'Admin View')

@section('CSSadded') {{-- Añadir css de esta vista --}}
    <link rel="stylesheet" href="{{ URL::asset('css/admin/admin_inicio.css') }}">
@endsection

@section('cuerpo')

    <div class="container">
        <h1 class="text-center my-5">Gestionar - Redes Disponibles</h1>
        @if (!$platforms)
            <div class="d-flex justify-content-end m-4">
                <button class="btn btn-primary">Crear Nueva Red Social</button>
            </div>
        @endif
        <table class="table table-dark table-bordered border-white table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre Red Social</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>

            @if (!$platforms)
                @foreach ($platforms as $platform)
                    <tr>
                        <th scope="row">{{ $platform->id }}</th>
                        <td class="text-center">
                            <p>{{ $platform->nombre }}</p>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-success">Editar</button>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-danger">Eliminar</button>
                        </td>
                    </tr>
                @endforeach

            @else
            <tr>
                <td class="text-center" colspan="4">
                    <button class="btn btn-success">Crear Nueva Red Social</button>
                </td>
            </tr>
            @endif
            </tbody>
        </table>
    </div>

@endsection
