<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::All();
        return view('levels.index', compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('levels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:2',
        ]);
        Level::create($request->only('nombre'));

        // Mensaje para indicar en index que se a creado con exito
        return Redirect::Route('levels.index')->with('createMsj', 'Nivel Creado con Exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function edit(Level $level)
    {
        return view('levels.edit')->with('level', $level);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Level $level)
    {
        $request->validate([
            'nombre' => 'required|string|max:5',
        ]);
        $level->nombre = $request->get('nombre');
        $level->update();

        // Mensaje para indicar en index que se a actualizado con exito
        return Redirect::Route('levels.index')->with('updateMsj', 'Nivel Actualizado con Exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level)
    {
        $level->delete();

        // Mensaje para indicar en index que se a eliminado con exito
        return Redirect::Route('levels.index')->with('errorMsj', 'Nivel Eliminado con Exito.');
    }
}
