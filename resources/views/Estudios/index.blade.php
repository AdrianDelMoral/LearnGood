@extends('layout')
@section('titulo', 'Precios del Profesor')

@section('CSSadded')
    <!--Añadir css de esta vista -->
    <link rel="stylesheet" href="{{ URL::asset('css/alumno/estudios.css') }}">
@endsection

@section('cuerpo')

<div class="container py-5 pb-2">
    <h1 class="text-center">Listado de Estudios</h1>
        <x-form-alerts/>

{{-- @if ($estudios->count() < 3) --}}
    <a href="{{ route('estudios.create') }}" class="btn btn-success my-3">Crear Nivel de Estudio</a>
{{-- @endif --}}

    <table class="table table-bordered border-warning bg-dark text-light">
        <thead class="text-center">
            <th class="text-center fw-bold text-warning">Nivel</th>
            <th class="text-center fw-bold text-warning">nota</th>
            <th class="text-center fw-bold text-warning">Fecha Finalizacion</th>
            <th class="text-center fw-bold text-warning">Editar</th>
            <th class="text-center fw-bold text-warning">Eliminar</th>
        </thead>
        <tbody class="text-center">
            @forelse ($estudios as $estudio)
                <tr>
                    <th class="text-center text-light">
                        @foreach ($levels as $level)
                            @if ($level->id == $estudio->levels_id  )
                                {{ $level->nombre }}
                            @endif
                        @endforeach
                        <!-- (No se porque no funciona si el modelo y relaciones están bien......) -->
                        {{-- {{ $estudio->level->nombre }}--}}
                    </th>
                    <th class="text-center text-light">{{ $estudio->nota }}</th>
                    <th class="text-center text-light">{{ $estudio->fechaFinalizacion }}</th>
                    <th class="text-center text-light">
                        <a href="{{ route('estudios.edit', $estudio) }}">
                            <button class="btn btn-success fas fa-edit fa-xl p-3"></button>
                        </a>
                    </th>
                    <th class="text-center">
                        <form action="{{ route('estudios.destroy', $estudio) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger fas fa-trash fa-xl p-3"></button>
                        </form>
                    </th>
                </tr>
            @empty
            <tr>
                <th colspan="7" class="text-center"><p class="h4 text-danger fw-bold m-5">No hay Niveles de Estudios Aun</p></th>
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
