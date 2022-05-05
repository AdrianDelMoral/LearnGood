@extends('layout')
@section('titulo', 'Editar información')

@section('CSSadded') {{-- Añadir css de esta vista --}}
    <link rel="stylesheet" href="{{ URL::asset('css/alumno/alumno_edit.css') }}">
@endsection

@section('cuerpo')
    {{-- <section class="row justify-content-center mLogin">
        <article class="col-md-6">
            <h1 class="text-center my-5">Registro de usuarios nuevos</h1>

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form action="/auth/register" method="post">

                        <input type="hidden" name="_csrf" value="{{ csrfToken }}" />

                        <h2 class="h3 text-center" for="form-check">Selecciona tu tipo de usuario:</h2>
                        <div class="d-flex justify-content-around my-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="typeUser" id="profesor" value="profesor"
                                    required>
                                <label class="form-check-label h5" for="profesor">Profesor</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="typeUser" id="alumno" value="alumno"
                                    required>
                                <label class="form-check-label h5" for="alumnno">Alumno</label>
                            </div>
                        </div>
                        <div class="form-floating mb-2">
                            <input class="form-control" id="nickname" name="nickname" type="text" value="iFullSt"
                                required>
                            <label for="floatingInput">Nombre de usuario(nickname)</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input class="form-control" id="nombre" name="nombre" type="text" value="Adrian" required>
                            <label for="floatingInput">Nombre</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input class="form-control" id="apellidos" name="apellidos" type="text"
                                value="Del Moral Martín" required>
                            <label for="floatingInput">Apellidos</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input class="form-control" id="email" name="email" type="email" value="iFullStart@gmail.com"
                                required>
                            <label for="floatingInput">Email</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input class="form-control" id="password" name="password" type="password" value="12345678"
                                required>
                            <label for="floatingInput">Contraseña</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input class="form-control" id="repassword" name="repassword" type="password" value="12345678"
                                required>
                            <label for="floatingInput">Repita la Contraseña</label>
                        </div>
                        <button class="btn btn-primary" type="submit">Registrarse</button>
                    </form>
                </div>
            </div>
        </article>
    </section> --}}

    <h1>editar solicitud alumno</h1>
@endsection
