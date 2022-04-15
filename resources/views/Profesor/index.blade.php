@extends('profesor_inicio')
@section('titulo', 'Página Principal')
@section('cuerpo')
    {{-- <div class="page-wrapper p-t-180 font-poppins">
        <section class="row justify-content-center">
            <article class="card bg-dark text-light col-md-10">
                <h1 class="text-center my-5">Información del {{ Auth::user()->role_id }}</h1>

                <div class="row align-items-md-stretch m-2">
                    <div class="col-md-2 mr-5">
                        <div>
                            <div class="fotoPerfil_profesorView">
                                <div class="cajaImg_profesorView">
                                    <div>
                                        <img src="{{ Auth::user()->profile_photo_url }}"
                                            alt="{{ Auth::user()->role_id }}" />
                                    </div>
                                </div>

                            </div>
                            {{ Auth::user()->nombre }}
                            {{ Auth::user()->apellidos }}
                        </div>

                    </div>
                    <div class="col-md-10">
                        Descripción
                        <div class="card">
                            <h2 class="mt-5 mb-3 lane text-center">Descripción del Profesor</h2>
                            <div class="p-4">
                                @if (Auth::user()->descripcion === null)
                                    <p>La descripción del usuario actualmente está vacia. Prueba a rellenar el campo desde
                                        el formulario proporcionado con el boton editar.</p>
                                @else
                                    <p>{{ Auth::user()->descripcion }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @if (Auth::user()->role_id === 'Admin' || Auth::user()->role_id === 'Profesor')
                        <div class="justify-content-end">
                            <button class="btn btn-success">Editar Información de Perfil</button>
                        </div>
                    @endif
                </div>
                <br>
                <br>
                <br>
                <div>
                    recibir tabla precios
                </div>
                <div>
                    recibir tabla especialidades
                </div>
            </article>
        </section>
    </div> --}}

    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" height="150px"
                        src="https://i.blogs.es/7436bd/descarga/1366_521.jpeg"><span
                        class="font-weight-bold mt-4">{{ Auth::user()->nombre }} {{ Auth::user()->apellidos }}</span>
                    <span class="text-black-50 mt-2">{{ Auth::user()->email }}</span>
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Ajustes de Perfil - {{ Auth::user()->role_id }}</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Nombre</label>
                            <input type="text" class="form-control bg-dark text-light" placeholder="Nombre"
                                value="{{ Auth::user()->nombre }}">
                        </div>
                        <div class="col-md-6"><label class="labels">Apellidos</label>
                            <input type="text" class="form-control" placeholder="Apellidos"
                                value="{{ Auth::user()->apellidos }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <fieldset disabled>
                            <div class="col-md-12 mb-3">
                                <label class="labels">Email</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->email }}" bloqued>
                            </div>
                        </fieldset>
                        @if (Auth::user()->descripcion === null)
                            <div class="col-md-12 mb-3">
                                <label for="descripcion" class="labels">Descripción sobre el Profesor</label>
                                <textarea class="form-control w-100" rows="3" style="resize: none;"
                                    placeholder="Escribe aquí una descripción que defina tus aptitudes y especialidades"></textarea>
                            </div>
                        @else
                            <div class="col-md-12 mb-3">
                                <label for="descripcion" class="labels">Descripción sobre el Profesor</label>
                                <textarea class="form-control w-100" style="resize: none;" rows="5"
                                    placeholder="Escribe aquí una descripción que defina tus aptitudes y especialidades">{{ Auth::user()->descripcion }}</textarea>
                            </div>
                        @endif

                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="labels">País</label>
                            <input type="text" class="form-control" placeholder="País" value="{{ Auth::user()->pais }}">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Ciudad</label>
                            <input type="text" class="form-control" placeholder="Ciudad"
                                value="{{ Auth::user()->ciudad }}">
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-dark add-experience" type="button">Guardar Ajustes</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">

                    <div class="col-md-12 mb-4">
                        <label class="labels">Experience in Designing</label>
                        <input type="text" class="form-control" placeholder="experience" value="">
                    </div>
                    <div class="col-md-12 mb-4">
                        <label class="labels">Additional Details</label>
                        <input type="text" class="form-control" placeholder="additional details" value="" </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center experience mb-4 rounded">
                        <span class="btn btn-dark add-experience">
                            Editar Especialidades
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
