@extends('layout')
@section('titulo', 'Admin View')

@section('CSSadded') {{-- Añadir css de esta vista --}}
    <link rel="stylesheet" href="{{ URL::asset('css/admin/admin_inicio.css') }}">
@endsection

@section('cuerpo')

    <div class="container">
        <h1 class="text-center my-5">Listado de Niveles de Ingles</h1>
        @if (!$levels)
            <div class="d-flex justify-content-end m-4">
                <button class="btn btn-primary">Crear Nuevo Nivel</button>
            </div>
        @endif

        <table class="table table-dark table-bordered border-white table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nivel de Ingles</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @if (!$levels)
                    @foreach ($levels as $level)
                        <tr>
                            <th scope="row">{{ $level->id }}</th>
                            <td class="text-center">
                                <p>{{ $level->nombre }}</p>
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
                        <button class="btn btn-success">Crear Nuevo Nivel</button>
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>

@endsection
