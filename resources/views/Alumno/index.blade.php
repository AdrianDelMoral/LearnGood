@extends('layout')
@section('titulo', 'Editar información')

@section('CSSadded') {{-- Añadir css de esta vista --}}
    <link rel="stylesheet" href="{{ URL::asset('css/alumno/alumno_inicio.css') }}">
@endsection

@section('cuerpo')
    <div class="m-5">
        <h1 class="text-center">Listado de Profesores</h1>
    </div>

    <div class="container">
        {{-- Paginator personalizado --}}
        <div class="d-flex justify-content-center">
            @if ($usersProfesor->hasPages())
                <nav role="navigation" aria-label="Pagination Navigation">
                    <ul class="pagination">
                        {{-- Previous Page Link --}}
                        @if ($usersProfesor->onFirstPage())
                            <li class="page-item disabled" aria-disabled="true">
                                <span
                                    class="bg-dark border border-warning text-light page-link">{!! __('X') !!}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="bg-dark page-link text-light border border-warning"
                                    href="{{ $usersProfesor->previousPageUrl() }}" rel="prev">
                                    {!! __('<span class="fa-solid fa-arrow-left"></span> Anterior') !!}
                                </a>
                            </li>
                        @endif

                        {{-- Next Page Link --}}
                        @if ($usersProfesor->hasMorePages())
                            <li class="page-item">
                                <a class="bg-dark page-link text-light border border-warning"
                                    href="{{ $usersProfesor->nextPageUrl() }}" rel="next">{!! __('Siguiente <span class="fa-solid fa-arrow-right"></span>') !!}</a>
                            </li>
                        @else
                            <li class="page-item disabled" aria-disabled="true">
                                <span
                                    class="bg-dark text-light border border-warning page-link">{!! __('X') !!}</span>
                            </li>
                        @endif
                    </ul>
                </nav>
            @endif
        </div>
        {{-- Paginator personalizado --}}
        <div class="row justify-content-center">
            @foreach ($usersProfesor as $user)
                <div class="col-lg-4 my-5">
                    <div class="card p-0">
                        <div class="card-image">
                            <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
                        </div>
                        <div class="card-content d-flex flex-column align-items-center">
                            <h4 class="text-dark pt-2">{{ $user->nombre }} {{ $user->apellidos }}</h4>
                            <ul class="social-icons d-flex justify-content-center">
                                <li style="--i:1">
                                    <a href="#">
                                        <span class="text-dark fab fa-linkedin"></span>
                                    </a>
                                </li>
                                <li style="--i:2">
                                    <a href="#">
                                        <span class="text-dark fab fa-twitter"></span>
                                    </a>
                                </li>
                                <li style="--i:3">
                                    <a href="#">
                                        <span class="text-dark fab fa-github"></span>
                                    </a>
                                </li>
                            </ul>

                            <a href="{{ route('alumnoviews.show', $user) }}">
                                <button class="btn btn-dark my-3">Ver Profesor</button>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- Paginator personalizado --}}
        <div class="d-flex justify-content-center">
            @if ($usersProfesor->hasPages())
                <nav role="navigation" aria-label="Pagination Navigation">
                    <ul class="pagination">
                        {{-- Previous Page Link --}}
                        @if ($usersProfesor->onFirstPage())
                            <li class="page-item disabled" aria-disabled="true">
                                <span
                                    class="bg-dark border border-warning text-light page-link">{!! __('X') !!}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="bg-dark page-link text-light border border-warning"
                                    href="{{ $usersProfesor->previousPageUrl() }}" rel="prev">
                                    {!! __('<span class="fa-solid fa-arrow-left"></span> Anterior') !!}
                                </a>
                            </li>
                        @endif

                        {{-- Next Page Link --}}
                        @if ($usersProfesor->hasMorePages())
                            <li class="page-item">
                                <a class="bg-dark page-link text-light border border-warning"
                                    href="{{ $usersProfesor->nextPageUrl() }}" rel="next">{!! __('Siguiente <span class="fa-solid fa-arrow-right"></span>') !!}</a>
                            </li>
                        @else
                            <li class="page-item disabled" aria-disabled="true">
                                <span
                                    class="bg-dark text-light border border-warning page-link">{!! __('X') !!}</span>
                            </li>
                        @endif
                    </ul>
                </nav>
            @endif
        </div>
        {{-- Paginator personalizado --}}
    </div>
    </div>
@endsection
