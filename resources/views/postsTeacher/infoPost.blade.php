@extends('layout')

@section('titulo', 'Listado de Cursos')

@section('CSSadded')
    <link rel="stylesheet" href="{{ URL::asset('css/InfoPost.css') }}">
@endsection

@section('cuerpo')
    @if (Auth::user()->role_id == 'Profesor')
        <div class="d-flex justify-content-end">

            <div class="d-flex justify-content-end">
                <button class="m-4 btn btn-success">Boton para editar</button>
            </div>

            <div class="d-flex justify-content-end">
                <button class="m-4 btn btn-danger">Boton para Eliminar</button>
            </div>
        </div>
    @endif
    <div class="mainContainer container">
        {{-- <img src="{{ asset('imagenes/postImages/' . $post->imagePost) }}" class="card-img-top" alt="{{ $post->titulo }}"> --}}
        <header class="masthead d-flex align-items-center"
            style="background-image: url('{{ asset('imagenes/postImages/' . $post->imagePost) }}'); height:20rem; background-position: center;background-repeat: no-repeat;">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto text-light">
                        <div class="page-heading text-center p-4 cardsInicio border border-radius">
                            <h1><u>{{ $post->titulo }}</u></h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="container ">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <!-- Home Post List -->
                    <article class="post-preview mt-5">
                        <h2 class="post-title text-center mb-5"><u>Entrada</u></h2>
                        <div class="mainContainer p-5">
                            <h3 class="post-subtitle">{{ $post->entrada }}</h3>
                        </div>

                    </article>

                    <article class="post-preview mt-5">
                        <h2 class="post-title text-center mb-5"><u>Contenido</u></h2>
                        <div class="mainContainer p-5">
                            <h4 class="post-subtitle">{{ $post->contenidoPost }}</h4>
                        </div>
                    </article>

                    <article class="post-preview mt-5">
                        <h2 class="post-title text-center mb-5"><u>Video:</u></h2>
                        @if ($post->video !== ' ')
                            {{-- <div class="d-flex justify-content-center">
                                <video src="{{ asset('postVideos/' . $post->video) }}" width="840" height="480"
                                    controls></video>
                            </div> --}}
                            <div class="d-flex justify-content-center mainContainer p-5">
                                <div class="btn-video">
                                    <div class="play"></div>
                                    <p>Play Video</p>
                                </div>
                                <div class="clip-video">
                                    <!-- Video Attribution  -->
                                    <video src="{{ asset('postVideos/' . $post->video) }}" controls="true"
                                        id="video"></video>
                                    <b class="close-video">Close</b>
                                </div>
                                <script type="text/javascript">
                                    let btn = document.querySelector(".btn-video");
                                    let clip = document.querySelector(".clip-video");
                                    let video = document.querySelector("#video");
                                    let close = document.querySelector(".close-video");
                                    btn.onclick = function() {
                                        btn.classList.add("active");
                                        clip.classList.add("active");
                                        video.currentTime = 0;
                                        video.play();
                                    }
                                    close.onclick = function() {
                                        btn.classList.remove("active");
                                        clip.classList.remove("active");
                                        video.pause();
                                    }
                                </script>
                            </div>
                        @else
                            <h4 class="post-subtitle">Este post no tiene videos actualmente</h4>
                        @endif
                    </article>
                    <article class="post-preview mt-5 d-flex justify-content-start">
                        <div class="btn mainContainer mb-5">
                            <p class="post-meta">Ultima actualización hace: {{ $post->updated_at->diffForHumans() }}</p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>

    {{-- Dentro del bucle en cada tarjeta del post --}}
    <div class="container my-5">
        <a class="btn btn-primary" href="{{ route('cursosposts.show', $post->courses_id) }}">Volver al Listado de posts
            →</a>
    </div>


@endsection
