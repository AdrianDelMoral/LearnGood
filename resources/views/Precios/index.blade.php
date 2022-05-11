@extends('layout')
@section('titulo', 'Precios del Profesor')

@section('CSSadded') {{-- Añadir css de esta vista --}}
    <link rel="stylesheet" href="{{ URL::asset('css/alumno/precios_inicio.css') }}">
@endsection

@section('cuerpo')

    <div class="container">
        <span class="h1">Precios de: {{ Auth::user()->nombre }}</span>
        <table class="table table-dark table-bordered border-light">
            <thead>
                <tr>
                    <th scope="col">Id User</th>
                    <th scope="col">ID</th>
                    <th scope="col">Precio €</th>
                    <th scope="col">Horas</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @if (!$precios)
                    <tr>
                        <td colspan="5" class="h4 text-center py-4">
                            <p>No hay datos</p>
                            <a href="{{ route('precios.create') }}">
                                <button class="btn btn-success">Añadir precios</button>
                            </a>
                        </td>
                    </tr>
                @else
                    @foreach ($precios as $precio)
                        <tr>
                            <th scope="row">{{ $precio->user_id }}</th>
                            <th scope="row">{{ $precio->id }}</th>
                            <td>{{ $precio->precio }}</td>
                            <td>{{ $precio->horas }}</td>
                            <td>
                                <span class="fas fa-edit"></span>
                            </td>
                            <td>
                                <span class="fas fa-delete"></span>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div class="pagination">
			<a href="#" class="next">
                    {{ $precios->links() }}
			</a>
		</div>
        <a href="/"><button class="btn btn-primary">volver a atrás</button></a>
    </div>
@endsection
