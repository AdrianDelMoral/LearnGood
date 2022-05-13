@extends('layout')
@section('titulo', 'Admin View')

@section('CSSadded') {{-- Añadir css de esta vista --}}
    <link rel="stylesheet" href="{{ URL::asset('css/admin/admin_inicio.css') }}">
@endsection

@section('cuerpo')
    <div class="container">
        <h1 class="text-center my-5">Gestionar - Usuarios</h1>
        <table class="table table-dark table-bordered border-white table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">ROL</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="text-center">
                        <th scope="row">{{ $user->id }}</th>
                        <th scope="row">
                            <div class="fotoPerfil">
                                <div class="cajaImg">
                                    <div class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ $user->profile_photo_url }}" src="{{ $user->role_id }}">
                                    </div>
                                </div>
                            </div>
                        </th>
                        <td class="text-center">
                            <p>{{ $user->role_id }}</p>
                        </td>
                        <td class="text-center">
                            <p>{{ $user->nombre }}</p>
                        </td>
                        <td class="text-center">
                            <p>{{ $user->apellidos }}</p>
                        </td>
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
