@extends('layout')
@section('titulo', 'Añadir un precio nuevo')

@section('CSSadded') {{-- Añadir css de esta vista --}}
    <link rel="stylesheet" href="{{ URL::asset('css/alumno/precios_create.css') }}">
@endsection

@section('cuerpo')
<div class="container">
    <div>
        <h1>Formulario de Añadir un precio nuevo</h1>
    </div>
    <div>
        <form action="">
            @csrf
            <div>
                <label class="labels" for="precio">Precio</label>
                <input type="number" name="precio" id="precio">
            </div>
            <div>
                <textarea name="descripcion" id="descripcion" class="radius-5 border-2" cols="30" rows="10" placeholder="Breve descripcion de este precio"></textarea>
            </div>
            <button class="btn btn-success">Añadir Precio</button>
        </form>
    </div>
</div>
@endsection
