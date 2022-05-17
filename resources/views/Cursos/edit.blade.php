@extends('layout')

@section('titulo', 'Editar Curso')

@section('CSSadded')
    <link rel="stylesheet" href="{{ URL::asset('css/profesor/profesor_show.css') }}">
@endsection

@section('cuerpo')

    <div class="container py-5 text-center">

            <h1>Editar Curso</h1>

            <form action="{{ route('cursos.update', $curso) }}" method="post">
            @method('PUT')

            @csrf

            <input required hidden type="text" name="user_id" id="user_id" value="{{ Auth::User()->id }}" required>

            <div class="mb-3">
                <label for="nombreCurso" class="form-label">Nombre del Curso</label>
                <input class="form-control" type="string" max="2" name="nombreCurso" id="nombreCurso" placeholder="Nombre del Curso"
                    value="{{ old('nombreCurso') ?? @$curso->nombreCurso }}">
                <p class="form-text">Escriba el nombre del Curso</p>
                @error('nombreCurso')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio del Curso</label>
                <input class="form-control" type="number" name="precio" id="precio" placeholder="Precio del Curso" value="{{ old('precio') ?? @$curso->precio }}">
                <p class="form-text">Escriba el precio Curso</p>
                @error('precio')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion</label>
                <input class="form-control" type="text" name="descripcion" id="descripcion" placeholder="Descripcion del curso" value="{{ old('descripcion') ?? @$curso->descripcion }}">
                <p class="form-text">Descripcion del curso</p>
                @error('form')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-info">Editar Curso</button>
        </form>
    </div>
@endsection
