@extends('layout')
@section('titulo', 'Admin View')

@section('CSSadded') {{-- Añadir css de esta vista --}}
    <link rel="stylesheet" href="{{ URL::asset('css/admin/admin_inicio.css') }}">
@endsection

@section('cuerpo')

    <div class="container">
        <h1 class="text-center my-5">Admin - Inicio</h1>
        <table class="table table-dark table-bordered border-white table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ROL</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td class="text-center"><p>{{ $user->role_id }}</p></td>
                        <td class="text-center"><p>{{ $user->nombre }}</p></td>
                        <td class="text-center"><p>{{ $user->apellidos }}</p></td>
                        <td class="text-center">
                            <button class="btn btn-success">Editar</button>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-danger">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
