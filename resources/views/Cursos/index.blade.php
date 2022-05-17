@extends('layout')
@section('titulo', 'Cursos del Profesor')

@section('CSSadded')
    <!--Añadir css de esta vista -->
    <link rel="stylesheet" href="{{ URL::asset('css/alumno/precios.css') }}">
@endsection

@section('cuerpo')

<div class="container py-5 pb-2">
    <h1 class="text-center">Listado de Cursos</h1>
        <x-form-alerts/>

    <a href="{{ route('cursos.create') }}" class="btn btn-success my-3">Crear Curso</a>

    <table class="table table-bordered border-warning bg-dark text-light">
        <thead class="text-center">
            <th class="text-center fw-bold text-warning">Nombre del Curso</th>
            <th class="text-center fw-bold text-warning">Precio €</th>
            <th class="text-center fw-bold text-warning">Descripcion</th>
            <th class="text-center fw-bold text-warning">Editar</th>
            <th class="text-center fw-bold text-warning">Eliminar</th>
        </thead>
        <tbody class="text-center">
            @forelse ($cursos as $curso)
                <tr>
                    <th class="text-center">{{ $curso->nombreCurso }}</th>
                    <th class="text-center">{{ $curso->precio }}</th>
                    <th class="text-center">{{ $curso->descripcion }}</th>
                    <th class="text-center">
                        <a href="{{ route('cursos.edit', $curso) }}">
                            <button class="btn btn-success fas fa-edit fa-xl p-3"></button>
                        </a>

                    </th>
                    <th class="text-center">
                        <form action="{{ route('cursos.destroy', $curso) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger fas fa-trash fa-xl p-3"></button>
                        </form>
                    </th>
                </tr>
            @empty
                <tr>
                    <th colspan="7" class="text-center"><p class="h4 text-danger fw-bold m-5">No hay Curso Aun</p></th>
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
