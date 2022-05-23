@extends('layout')

@section('titulo', 'Crear Curso')

@section('CSSadded')
    <link rel="stylesheet" href="{{ URL::asset('css/profesor/profesor_show.css') }}">
@endsection

@section('cuerpo')
    <div class="container py-5 text-center">

        <h1>Crear Curso</h1>

        <form action="{{ route('cursos.store') }}" method="post">

            @csrf

            <div class="form-check input-group mb-3 d-flex align-items-center">
                <div>
                    <label class="bg-dark text-white border-dark input-group-text" for="studies_id">Categorias</label>
                </div>
                <select class="form-control" id="studies_id" name="studies_id" required>
                    <option selected disabled>Selecciona una Categoria del Curso</option>
                    @foreach ($estudiosProfe as $estudio)
                        <option value="{{ $estudio->id }}"@if (isset($curso)) {{ $curso->studies_id == $estudio->id ? 'selected' : '' }} @endif>{{ $estudio->nivel->nombre }}</option>
                    @endforeach
                </select>
            </div>
            @error('studies_id')
                <p class="form-text text-danger p-3 bg-dark fw-bold">{{ $message }}</p>
            @enderror

            <div class="form-check mb-3">
                <label for="nombreCurso" class="h5 form-label">Nombre del Curso</label>
                <input class="form-control" type="string" name="nombreCurso" id="nombreCurso"
                    placeholder="Nombre del Curso" value="{{ old('nombreCurso')}}" required>
                @error('nombreCurso')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <label for="precio" class="form-label h5">Precio del Curso</label>
            <div class="form-check input-group mb-3">
                <div class="input-group-prepend">
                    <span class="bg-dark text-white border-dark input-group-text">€</span>
                </div>
                <input class="form-control" type="number" name="precio" id="precio" placeholder="Precio del Curso"
                    aria-label="Precio del Curso" value="{{ old('precio')}}" required>
                <div class="input-group-prepend">
                    <span class="bg-dark text-white border-dark input-group-text">0.00</span>
                </div>
                @error('precio')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <label id="descripcion_label" for="descripcion" class="h5" required>Descripcion del Curso</label>
            <div class="form-check mb-3">
                <textarea id="descripcion" name="descripcion" rows="2" class="form-control" placeholder="Descripcion del Curso"
                    required>{{ old('descripcion')}}</textarea>
                @error('descripcion')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-info border-dark">Guardar Curso</button>
        </form>
    </div>
    <div class="container">
        <a href="{{ route('cursos.index') }}">
            <button class="btn btn-primary mt-1 mb-5">Volver al Listado de Cursos</button>
        </a>
    </div>
@endsection
