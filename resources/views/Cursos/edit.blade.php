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

            <div class="form-check input-group mb-3">
                <div>
                    <label class="bg-dark text-white border-dark input-group-text" for="studies_id">Categorias</label>
                </div>
                <select class="form-control" name="studies_id" id="studies_id" required>
                    <option value="a" selected disabled>Selecciona una Categoria del Curso</option>
                    @foreach ($estudiosProfe as $estudio)
                        <option value="{{ $estudio->id }}"
                            @if (isset($curso)) {{ $curso->studies_id == $estudio->id ? 'selected' : '' }} @endif>
                            {{ $estudio->nivel->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('studies_id')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-check mb-3">
                <label for="nombreCurso" class="form-label">Nombre del Curso</label>
                <input class="form-control" type="string" max="2" name="nombreCurso" id="nombreCurso"
                    placeholder="Nombre del Curso" value="{{ old('nombreCurso') ?? @$curso->nombreCurso }}" required>
                @error('nombreCurso')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-check input-group mb-3">
                <div class="input-group-prepend">
                    <span class="bg-dark text-white border-dark input-group-text">€</span>
                </div>
                <input class="form-control text-end" type="number" name="precio" id="precio" placeholder="Precio del Curso"
                    value="{{ old('precio') ?? @$curso->precio }}" aria-label="Precio del Curso" required>
                <div class="input-group-prepend">
                    <span class="bg-dark text-white border-dark input-group-text">0.00</span>
                </div>
                @error('precio')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-check mb-3">
                <label id="descripcion_label" for="descripcion" class="h4" required>Descripcion del
                    Curso</label>
                <textarea id="descripcion" name="descripcion" rows="5" class="form-control" placeholder="Descripcion del Curso"
                    required>
@if (isset($curso->descripcion))
{{ $curso->descripcion }}
@endif
</textarea>
                @error('descripcion')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-info border border-dark">Editar Curso</button>
        </form>
    </div>
    <div class="container">
        <a href="{{ route('cursos.index') }}">
            <button class="btn btn-primary mt-1 mb-5">Volver al Listado de Cursos</button>
        </a>
    </div>
@endsection
