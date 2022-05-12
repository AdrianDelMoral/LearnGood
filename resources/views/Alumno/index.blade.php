@extends('layout')
@section('titulo', 'Editar información')

@section('CSSadded') {{-- Añadir css de esta vista --}}
    <link rel="stylesheet" href="{{ URL::asset('css/alumno/alumno_inicio.css') }}">
@endsection

@section('cuerpo')
    <h1>alumno inicio</h1>

    <div class="container">
        <div class="row">
            @foreach ($usersProfesor as $user)
                @if ($user->role_id == 'Profesor')
                    <div class="col-lg-4 my-5">
                        <div class="card p-0">
                            <div class="card-image">
                                <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
                            </div>
                            <div class="card-content d-flex flex-column align-items-center">
                                <h4 class="pt-2">{{ $user->nombre }} {{ $user->apellidos }}</h4>
                                <ul class="social-icons d-flex justify-content-center">
                                    <li style="--i:1"> <a href="#"> <span class="fab fa-linkedin"></span> </a> </li>
                                    <li style="--i:2"> <a href="#"> <span class="fab fa-twitter"></span> </a> </li>
                                    <li style="--i:3"> <a href="#"> <span class="fab fa-github"></span> </a> </li>
                                </ul>
                                <a href="{{ route('alumno.index', $user->id) }}">
                                    <button class="btn btn-dark my-3">Ver Profesor</button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
