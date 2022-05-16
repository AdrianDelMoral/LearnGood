@extends('layout')
@section('titulo', 'Listado de Plataformas')

@section('CSSadded')
    <!--Añadir css de esta vista -->
    <link rel="stylesheet" href="{{ URL::asset('css/alumno/levels.css') }}">
@endsection

@section('cuerpo')

    <div class="container py-5 pb-2">
        <h1 class="text-center">Listado de Niveles Disponibles</h1>

        <x-form-alerts />

        <a href="{{ route('levels.create') }}" class="btn btn-success my-3">Crear Nivel</a>

        <table class="table table-bordered border-warning bg-dark text-light">
            <thead class="text-center">
                <th class="text-center fw-bold text-warning">Nombre del Nivel</th>
                <th class="text-center fw-bold text-warning">Editar</th>
                <th class="text-center fw-bold text-warning">Eliminar</th>
            </thead>
            <tbody class="text-center">
                @forelse($levels as $level)
                    <tr>
                        <th class="text-center">{{ $level->nombre }}</th>
                        <th class="text-center">
                            <a href="{{ route('levels.edit',$level) }}">
                                <button class="btn btn-success fas fa-edit fa-xl p-3"></button>
                            </a>

                        </th>
                        <th class="text-center">
                            <form action="{{ route('levels.destroy', $level) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger fas fa-trash fa-xl p-3"></button>
                            </form>
                        </th>
                    </tr>
                @empty
                    <tr>
                        <th colspan="7" class="text-center">
                            <p class="h4 text-danger fw-bold m-5">No hay Niveles Disponibles Aun</p>
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
