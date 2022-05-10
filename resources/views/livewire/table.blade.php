<div class="container">
    <h2 class="text-center my-5">Lista de Plataformas</h2>

    <table class="table table-dark table-bordered border-white table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th>Nombre</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @if ($platforms)
                @foreach ($platforms as $platform)
                    <tr>
                        <th scope="row">{{ $platform->id }}</th>
                        <td class="text-center">
                            <p>{{ $platform->nombre }}</p>
                        </td>
                        <td class="text-center">
                            <button wire:click="edit({{ $platform->id }})" class="btn btn-success">Editar</button>
                        </td>
                        <td class="text-center">
                            <button wire:click="destroy({{ $platform->id }})" class="btn btn-danger">Eliminar</button>
                        </td>
                    </tr>
                    {{ $platforms->links }}
                @endforeach
            @else
                <tr>
                    <td colspan="4" class="text-center h4">No hay posts creados</td>
                </tr>
            @endif
        </tbody>
    </table>
    @if (!$platforms)
    @endif
</div>
