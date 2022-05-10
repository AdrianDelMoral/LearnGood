<div>
    <label for="Nombre">Nombre</label>
    <input type="text" class="form-control" wire:model="nombre">
    @error('nombre')
        <span>{{ $message }}</span>
    @enderror
</div>
