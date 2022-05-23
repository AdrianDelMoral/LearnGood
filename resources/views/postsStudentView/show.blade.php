@extends('layout')

@section('titulo', 'Listado de Cursos')

@section('CSSadded')
    <link rel="stylesheet" href="{{ URL::asset('css/profesor/profesor_show.css') }}">
@endsection

@section('cuerpo')
    <div class="p-4">
        <h1 class="text-center fw-bold">Listado de Posts de este Curso{{ $Curso->nombreCurso }}</h1>
        <h2>Usuario: {{ Auth::user()->role_id }}</h2>

        <div class="text-dark p-5 row row-cols-1 row-cols-md-3 g-4">
            @if ($status == 1)
                @if (count($posts) == 0)
                    <div class="container my-5">
                        <h1 class="fw-bold mb-5">Aún no se han creado Posts en este curso aun.</h1>
                    </div>
                @else
                    @foreach ($posts as $post)
                        <div class="col" style="min-height: 641px;"">
                                    <div class="  card h-100">
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
                            <div class="m-3">
                                <a href="{{ route('alumnosposts.infoPost', $post) }}" class="btn btn-warning">
                                    Ver Post
                                </a>
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
        @endif
    @else
        <div class="container d-flex justify-content-center align-content-center">
            <div class="card bg-dark text-light">
                <div class="card-header">
                    Acceso No Permitido
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>Debes Comprar el curso para poder ver el contenido de el.</p>
                        </footer>
                    </blockquote>
                </div>
            </div>
        </div>
        @endif
    </div>
    </div>
@endsection
