@extends('layout')

@section('titulo', 'Listado de Cursos')

@section('CSSadded')
    <link rel="stylesheet" href="{{ URL::asset('css/profesor/profesor_show.css') }}">
@endsection

@section('cuerpo')
    @if (Auth::user()->role_id == 'Profesor')
        <div class="d-flex justify-content-end">{{-- posts.createPost, $postsDelCurs --}}
            @if (count($posts) >= 1)
                <a href="{{ route('cursosposts.createPost', $Curso) }}" class="m-4 btn btn-success border-dark">
                    Crear Post
                </a>
            @endif

        </div>
    @endif
    <div class="p-4">
        <h1 class="text-center fw-bold"><u>{{ $Curso->nombreCurso }}</u></h1>
        <h2>Usuario: {{ Auth::user()->role_id }}</h2>

        <div class="container">
            <x-form-alerts />
        </div>

        @if (count($posts) == 0)
            <div class="container my-5">
                <div class="card bg-dark text-light">
                    <div class="card-header text-center">
                        <h2>Aun no se ha creado ningun post</h2>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-center p-5">
                        <p class="h6 text-warning fw-bold me-3">Prueba a crear uno:</p>
                        @if (Auth::user()->role_id == 'Profesor')
                            <a href="{{ route('cursosposts.createPost', $Curso) }}"
                                class="btn btn-success border-dark">Crear
                                Post</a>
                        @endif
                    </div>
                </div>
            </div>
        @else
            <div class="text-dark p-5 row row-cols-1 row-cols-md-3 g-4">
                @foreach ($posts as $post)
                    <div class="col" style="min-height: 641px;"">
                            <div class=" card h-100">
                        @if ($post->imagePost !== null)
                            <img src="{{ asset('imagenes/postImages/' . $post->imagePost) }}" class="card-img-top"
                                alt="{{ $post->titulo }}">
                        @else
                            <img src="https://wpdirecto.com/wp-content/uploads/2017/08/alt-de-una-imagen.png"
                                class="card-img-top" alt="Imagen Por defecto del Post">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title fw-italic">{{ $post->titulo }}</h5>
                            <p class="card-text">{{ $post->entrada }} </p>
                        </div>
                        <div class="m-3 d-flex row">
                            <div class="col">
                                <a href="{{ route('cursosposts.infoPost', $post) }}" class="btn btn-warning">
                                    Ver Post
                                </a>
                            </div>
                            <div class="col d-flex align-items-center justify-content-end">
                                <a href="{{ route('cursosposts.edit', $post) }}" class="mx-2">
                                    <button class="btn btn-success fas fa-edit fa-xl p-3"></button>
                                </a>
                                <form action="{{ route('cursosposts.destroy', $post) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger fas fa-trash fa-xl p-3 mx-2"></button>
                                </form>
                            </div>
                        </div>
                        <div class="card-footer text-muted">
                            Ultima actualización:
                            <small>
                                <strong>
                                    {{ $post->created_at->diffForHumans() }}
                                </strong>
                            </small>
                        </div>
                    </div>
            </div>
        @endforeach
    </div>
    @endif
    </div>

@endsection
