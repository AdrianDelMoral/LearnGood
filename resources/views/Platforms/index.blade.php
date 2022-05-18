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

        @if ($platforms->count() < 3)
            <a href="{{ route('platforms.create') }}" class="btn btn-success my-3">Crear Plataforma</a>
        @endif

        <table class="table table-bordered border-warning bg-dark text-light">
            <thead class="text-center">
                <th class="text-center fw-bold text-warning">Foto de la Plataforma</th>
                <th class="text-center fw-bold text-warning">Nombre de la Plataforma</th>
                <th class="text-center fw-bold text-warning">URL de la Plataforma</th>
                <th class="text-center fw-bold text-warning">Editar</th>
                <th class="text-center fw-bold text-warning">Eliminar</th>
            </thead>
            <tbody class="text-center">
                @forelse($platforms as $platform)
                    <tr>
                        <th class="text-center">
                            <div class="fotoPerfil">
                                <div class="cajaImg">
                                    <div class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ asset('imagenes/platformImages/'.$platform->platformImage) }}" alt="{{ $platform->role_id }}">
                                    </div>
                                </div>
                            </div>
                        </th>
                        <th class="text-center">{{ $platform->nombre }}</th>
                        <th class="text-center">{{ $platform->platformURL }}</th>
                        <th class="text-center">
                            <a href="{{ route('platforms.edit',$platform) }}">
                                <button class="btn btn-success fas fa-edit fa-xl p-3"></button>
                            </a>

                        </th>
                        <th class="text-center">
                            <form action="{{ route('platforms.destroy', $platform) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger fas fa-trash fa-xl p-3"></button>
                            </form>
                        </th>
                    </tr>
                @empty
                    <tr>
                        <th colspan="7" class="text-center">
                            <p class="h4 text-danger fw-bold m-5">No hay Plataformas Disponibles aun</p>
                        </th>
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
