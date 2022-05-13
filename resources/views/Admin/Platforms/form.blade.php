@extends('layout')

@section('titulo', 'Lista de Precios')

@section('CSSadded')
    <link rel="stylesheet" href="{{ URL::asset('css/profesor/profesor_show.css') }}">
@endsection

@section('cuerpo')
    {{-- Route::resource('precios', PriceController::class);  route('precios./index/create/update....') --}}
    <div class="container py-5 text-center">

        @if (isset($platform))
            <h1>Editar Plataforma</h1>
            @method('PUT')
        @else
            <h1>Crear Plataforma</h1>
        @endif

        @if (isset($platform))
            <form action="{{ route('platforms.update', $platform) }}" method="post" enctype="multipart/formdata">
            @method('PUT')
        @else
            <form action="{{ route('platforms.store') }}" method="post" enctype="multipart/formdata">
        @endif

            @csrf

            <input required hidden type="text" name="user_id" id="user_id" value="{{ Auth::User()->id }}" required>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre de la Plataforma</label>
                <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre de la Plataforma"
                    value="{{ old('nombre') ?? @$platform->nombrePack }}">
                <p class="form-text">Escriba el nombre del Pack</p>
                @error('form')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="Foto" class="form-label">Foto de la Plataforma</label>
                <input class="form-control" type="file" accept="image/*" required name="Foto" id="Foto" placeholder="Precio del Pack" value="{{ old('Foto') ?? @$platform->Foto }}">
                <p class="form-text">Suba una imagen del icono de la plataforma(Formatos Admitidos: SVG)</p>
                @if (isset($platform))
                {{ $platform->Foto }}
                @endif
                @error('Foto')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            @if (isset($platform))
                <button type="submit" class="btn btn-info">Editar Precio</button>
            @else
                <button type="submit" class="btn btn-info">Guardar Precio</button>
            @endif
        </form>
    </div>
@endsection
