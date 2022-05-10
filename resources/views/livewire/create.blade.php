<h2>Nueva Plataforma</h2>
{{-- La vista de creacion tiene aqui una config basica --}}
@include('livewire.form') {{-- y dentro el formulario --}}

{{-- Cuanto presione el boton guardar, usara el metodo store que esta en app\Http\Livewire\PlatformComponent --}}
<button wire:click="store" class="btn btn-primary">
    Guardar
</button>
