@extends('layout')

@section('titulo', 'Listado de Cursos')

@section('CSSadded')
    <link rel="stylesheet" href="{{ URL::asset('css/InfoPost.css') }}">
@endsection

@section('cuerpo')
    <div class="mainContainer container">
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
                        <div class="d-flex justify-content-center mainContainer p-5">
                            @if ($post->video !== null)
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
                            @else
                                <h4 class="post-subtitle">Este post no tiene videos actualmente</h4>
                            @endif
                        </div>
                    </article>
                    <article class="post-preview mt-5 d-flex justify-content-start">
                        <div class="btn mainContainer mb-5">
                            <p class="post-meta">Ultima actualizaci??n hace: {{ $post->updated_at->diffForHumans() }}
                            </p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>

    {{-- Dentro del bucle en cada tarjeta del post --}}
    <div class="container my-5">
        <a class="btn btn-primary" href="{{ route('alumnosposts.show', $post->courses_id) }}">Volver al Listado de posts
            ???</a>
    </div>


@endsection
