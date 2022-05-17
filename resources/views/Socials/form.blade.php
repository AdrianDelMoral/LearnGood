@extends('layout')

@section('titulo', 'Lista de Precios')

@section('CSSadded')
    <link rel="stylesheet" href="{{ URL::asset('css/profesor/profesor_show.css') }}">
@endsection

@section('cuerpo')
    <div class="container py-5 text-center">

        @if (isset($estudio))
            <h1>Editar Red Social</h1>
            @method('PUT')
        @else
            <h1>Crear Red Social</h1>
        @endif

        @if (isset($estudio))
            <form action="{{ route('socials.update', $estudio) }}" method="post">
                @method('PUT')
            @else
                <form action="{{ route('socials.store') }}" method="post">
        @endif

        @csrf

        <input required hidden type="text" name="user_id" id="user_id" value="{{ Auth::User()->id }}" required>

        <div class="mb-3">
            <select class="form-control" name="platform_id">
                <option value="a" selected disabled>===Selecciona una Red Social===</option>
                @foreach ($platforms as $platform)
                    <option value="{{ $platform->id }}" @if(isset($estudio)) {{ $estudio->platform_id == $platform->id ? 'selected' : '' }}@endif>
                        {{ $platform->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Nombre de Usuario</label>
            <input class="form-control" type="text" name="username" id="username" placeholder="Nombre de Usuario"
                value="{{ old('username') ?? @$social->username }}">
            <p class="form-text">Nombre de usuario</p>
            @error('username')
                <p class="form-text text-danger">{{ $message }}</p>
            @enderror
        </div>

        @if (isset($social))
            <button type="submit" class="btn btn-info">Editar Red Social</button>
        @else
            <button type="submit" class="btn btn-info">Guardar Red Social</button>
        @endif
        </form>
    </div>
    <div class="container">
        <a href="{{ route('socials.index') }}"><button class="btn btn-primary mt-1 mb-5">Volver al Listado</button></a>
    </div>
@endsection
