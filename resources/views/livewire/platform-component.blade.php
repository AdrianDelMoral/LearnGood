<div class="container">
    <div class="col-sm-3">
        @include('livewire.create') {{-- Este componente llama a la vista de creación --}}
    </div>

    <div class="col-sm-9">
        @include('livewire.table') {{-- Este componente llama a la vista de mostrar la tabla--}}
    </div>
</div>
