@extends('layout')
@section('titulo', 'Precios del Profesor')

@section('CSSadded') {{-- Añadir css de esta vista --}}
    {{-- <link rel="stylesheet" href="{{ URL::asset('css/alumno/precios_inicio.css') }}"> --}}
@endsection

@section('cuerpo')

    <div id="app">
        <main class="pt-4">
            {{-- cambiar dentro --}}

            <div class="container py-5">
                <div class="modal fade" id="addPriceModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Añadir Precios</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <ul id="errors_messages"></ul>

                                <div class="form-group mb-3">
                                    <label for="precio">Precio €</label>
                                    <input type="number" class="precio form-control" placeholder="Ingrese el precio">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="horas">Horas</label>
                                    <input type="number" class="horas form-control" placeholder="Ingrese las horas">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary add_price">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container py-5">
                <div class="row">
                    <div class="col-md-12">

                        <div id="success_message"></div>

                        <div class="card">
                            <div class="card-header">
                                <h4>Lista de Precios
                                    <!-- Button trigger modal -->
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#addPriceModal" type="button"
                                        class="btn btn-primary float-end btn-sm">Añadir Precio</a>
                                </h4>
                            </div>
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                </div>
                <a href="/" class="btn btn-primary mt-4">
                    volver a atrás
                </a>
            </div>
        </main>
    </div>

@endsection

@section('JSadded') {{-- Añadir Js de esta vista --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/profesor/precios/prices.js') }}"></script>
    {{-- <script src="{{ asset('js/direccion/edit.js') }}" defer></script>
        <script src="{{ asset('js/User/index.js') }}" defer></script>
        <script src="{{ asset('js/User/store.js') }}" defer></script>
        <script src="{{ asset('js/Contacto/index.js') }}" defer></script>
        <script src="{{ asset('js/Enterprise/index.js') }}" defer></script>
        <script src="{{ asset('js/Admin-Panel/index.js') }}" defer></script> --}}
@endsection
