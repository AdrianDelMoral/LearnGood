@extends('layout')
@section('titulo', 'Listado de Plataformas')

@section('CSSadded')
    <!--Añadir css de esta vista -->
    <link rel="stylesheet" href="{{ URL::asset('css/alumno/platforms.css') }}">
@endsection

@section('cuerpo')

    <div class="container py-5 pb-2">
        <h1 class="text-center">Listado de Usuarios</h1>

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
                        <th class="text-center">
                            <a href="{{ route('manageusers.edit', $user) }}">
                                <button class="btn btn-success fas fa-edit fa-xl p-3"></button>
                            </a>
                        </th>
                        @if ($user->id > 1)
                            <th class="text-center">
                                <form action="{{ route('manageusers.destroy', $user->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger fas fa-trash fa-xl p-3"></button>
                                </form>
                            </th>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            @if ($users->hasPages())
                <nav role="navigation" aria-label="Pagination Navigation">
                    <ul class="pagination">
                        <!-- Previous Page Link -->
                        @if ($users->onFirstPage())
                            <li class="page-item disabled" aria-disabled="true">
                                <span class="bg-dark border border-warning text-light page-link">{!! __('X') !!}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="bg-dark page-link text-light border border-warning" href="{{ $users->previousPageUrl() }}" rel="prev">
                                    {!! __('<span class="fa-solid fa-arrow-left"></span> Anterior') !!}
                                </a>
                            </li>
                        @endif

                        <!-- Next Page Link -->
                        @if ($users->hasMorePages())
                            <li class="page-item">
                                <a class="bg-dark page-link text-light border border-warning" href="{{ $users->nextPageUrl() }}"
                                    rel="next">{!! __('Siguiente <span class="fa-solid fa-arrow-right"></span>') !!}</a>
                            </li>
                        @else
                            <li class="page-item disabled" aria-disabled="true">
                                <span class="bg-dark text-light border border-warning page-link">{!! __('X') !!}</span>
                            </li>
                        @endif
                    </ul>
                </nav>
            @endif
        </div>
    </div>

    <div class="container">
        <a href="{{ url('/') }}"><button class="btn btn-primary mt-1 mb-5">Volver al Inicio</button></a>
    </div>


@endsection
@section('JSadded')
@endsection
