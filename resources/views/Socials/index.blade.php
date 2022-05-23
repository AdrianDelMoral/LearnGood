@extends('layout')
@section('titulo', 'Precios del Profesor')

@section('CSSadded')
    <!--Añadir css de esta vista -->
    <link rel="stylesheet" href="{{ URL::asset('css/alumno/estudios.css') }}">
@endsection

@section('cuerpo')

<div class="container py-5 pb-2">
    <h1 class="text-center">Listado de Redes Sociales</h1>
        <x-form-alerts/>

    <a href="{{ route('socials.create') }}" class="btn btn-success my-3">Crear Red Social</a>

    <table class="table table-bordered border-warning bg-dark text-light">
        <thead class="text-center">
            <th class="text-center fw-bold text-warning">Imagen</th>
            <th class="text-center fw-bold text-warning">Nombre de Plataforma</th>
            <th class="text-center fw-bold text-warning">User Name</th>
            <th class="text-center fw-bold text-warning">Editar</th>
            <th class="text-center fw-bold text-warning">Eliminar</th>
        </thead>
        <tbody class="text-center">
            @forelse ($socials as $social)
                <tr>
                    <th class="text-center bg-secondary">
                        <div class="fotoPerfil">
                            <div class="cajaImg">
                                <div class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ asset('imagenes/platformImages/'.$social->platform->platformImage) }}" alt="{{ $social->platform->nombre}}">
                                </div>
                            </div>
                        </div>
                    </th>
                    <th class="text-center text-light">{{ $social->platform->nombre }}</th>
                    <th class="text-center text-light">{{ $social->username }}</th>
                    <th class="text-center text-light">
                        <a href="{{ route('socials.edit', $social) }}">
                            <button class="btn btn-success fas fa-edit fa-xl p-3"></button>
                        </a>
                    </th>
                    <th class="text-center">
                        <form action="{{ route('socials.destroy', $social) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger fas fa-trash fa-xl p-3"></button>
                        </form>
                    </th>
                </tr>
            @empty
            <tr>
                <th colspan="7" class="text-center"><p class="h4 text-danger fw-bold m-5">No hay Redes Sociales Aun</p></th>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="container">
    <a href="{{ url('/') }}"><button class="btn btn-primary mt-1 mb-5">Volver al Inicio</button></a>
</div>

@endsection
@section('JSadded')
@endsection
