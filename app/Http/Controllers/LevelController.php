<?php

namespace App\Http\Controllers;

use App\Http\Requests\LevelRequest;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LevelController extends Controller
{
    public function index()
    {
        $levels = Level::All();
        return view('levels.index', compact('levels'));
    }

    public function create()
    {
        return view('levels.create');
    }

    public function store(LevelRequest $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:20',
        ]);
        Level::create($request->only('nombre'));

        // Mensaje para indicar en index que se a creado con exito
        return Redirect::Route('levels.index')->with('createMsj', 'Nivel Creado con Exito.');
    }

    public function show(Level $level)
    {
        //
    }

    public function edit(Level $level)
    {
        return view('levels.edit')->with('level', $level);
    }

    public function update(LevelRequest $request, Level $level)
    {
        $request->validate([
            'nombre' => 'required|string|max:20',
        ]);
        $level->nombre = $request->get('nombre');
        $level->update();

        // Mensaje para indicar en index que se a actualizado con exito
        return Redirect::Route('levels.index')->with('updateMsj', 'Nivel Actualizado con Exito.');
    }

    public function destroy(Level $level)
    {
        $level->delete();

        // Mensaje para indicar en index que se a eliminado con exito
        return Redirect::Route('levels.index')->with('errorMsj', 'Nivel Eliminado con Exito.');
    }
}
