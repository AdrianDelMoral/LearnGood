@extends('layout')
@section('titulo', 'Listado de Plataformas')

@section('CSSadded')
    <!--Añadir css de esta vista -->
    <link rel="stylesheet" href="{{ URL::asset('css/alumno/platforms.css') }}">
@endsection

@section('cuerpo')

    <div class="container py-5 pb-2">
        <h1 class="text-center">Listado de Plataformas Disponibles</h1>

        <x-form-alerts />

        <table class="table table-bordered border-warning bg-dark text-light">
            <thead>
                <tr>
                    <th scope="col" class="text-center text-warning">Id</th>
                    <th scope="col" class="text-center text-warning">Imagen</th>
                    <th scope="col" class="text-center text-warning">ROL</th>
                    <th scope="col" class="text-center text-warning">Nombre</th>
                    <th scope="col" class="text-center text-warning">Apellidos</th>
                    <th scope="col" class="text-center text-warning">Editar</th>
                    <th scope="col" class="text-center text-warning">Eliminar</th>
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
                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ $user->profile_photo_url }}" alt="{{ $user->role_id }}">
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
    <div class="container">
        <a href="{{ url('/') }}"><button class="btn btn-primary mt-1 mb-5">Volver al Inicio</button></a>
    </div>

@endsection
@section('JSadded')
@endsection
