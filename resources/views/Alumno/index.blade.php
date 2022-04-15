@extends('alumno_inicio')
@section('titulo', 'Editar información')
@section('cuerpo')
    {{-- <section class="row justify-content-center mLogin">
        <article class="col-md-6">
            <h1 class="text-center my-5">Información del usuario</h1>

            <div class="row justify-content-center">
                <div class="col-md-6">
                Aqui la info
                </div>
            </div>
        </article>
    </section> --}}
    <section class="container rounded bg-white mt-5 mb-5">
        <article class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" height="150px"
                        src="https://i.blogs.es/7436bd/descarga/1366_521.jpeg"><span class="font-weight-bold">Edogaru</span>
                    <span class="text-black-50">edogaru@mail.com.my</span>
                    <span>
                    </span>
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
                            <input type="text" class="form-control" placeholder="Nombre" value="">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Apellidos</label>
                            <input type="text" class="form-control" value="" placeholder="Apellidos">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <fieldset disabled>
                            <div class="col-md-12 mb-3">
                                <label class="labels">Email</label>
                                <input type="text" class="form-control" value="email@gmail.com" bloqued>
                            </div>
                        </fieldset>
                        <div class="col-md-12 mb-3">
                            <label for="descripcion" class="labels">Descripción sobre el Profesor</label>
                            <textarea class="form-control" id="descripcion" rows="3" placeholder="Escribe una pequeña descripción sobre ti">

                            </textarea>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="labels">País</label>
                            <input type="text" class="form-control" placeholder="País" value="">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Ciudad</label>
                            <input type="text" class="form-control" placeholder="Ciudad" value="">
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="button">Guardar Ajustes</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience mb-4 rounded">
                        <span class="border px-3 p-1 add-experience rounded-3 bg_dark_text_light">
                            <i class="fa fa-plus">
                            </i>Editar Especialidades</span>
                    </div>

                    <div class="col-md-12 mb-4">
                        <label class="labels">Experience in Designing</label>
                        <input type="text" class="form-control" placeholder="experience" value="">
                    </div>
                    <div class="col-md-12 mb-4">
                        <label class="labels">Additional Details</label>
                        <input type="text" class="form-control" placeholder="additional details" value="" </div>
                    </div>
                </div>
            </div>
        </article>
    </section>
@endsection
