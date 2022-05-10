<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Platform;

class PlatformComponent extends Component
{
    use WithPagination;

    public $platform_id, $nombre;
    public $view = 'create';

    public function render()
    {
        return view('livewire.platform-component', [
            'platforms' => Platform::orderBy('id', 'desc')->paginate(3)
        ]);
    }

    public function store()
    {
        $this->validate(['nombre' => 'required']);

        $platform = Platform::create([
            'nombre' => $this->nombre,
        ]);

        $this->edit($platform->id);
    }

    public function edit($id)
    {
        $platform = Platform::find($id);

        $this->platform_id = $platform->id;
        $this->nombre = $platform->nombre;
        $this->view = 'edit';
    }

    public function update($id)
    {
        $this->validate(['nombre' => 'required']);

        $platform = Platform::find($this->platform_id);

        $platform->update([
            'nombre' => $this->nombre,
        ]);
    }

    public function destroy($id)
    {
        Platform::destroy($id);
    }

    public function default($id) // default: porque es el comportamiento por defecto de mis elementos
    {
        $this->nombre = '';

        $this->view = 'create';
    }
}
