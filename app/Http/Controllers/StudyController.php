<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Study;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // usuario conectado actualmente
        $user = Auth::user()->id;

        $levels = Level::get();
        // sacar los precios del profesor que esta actualmente logeado
        $estudios = Study::where('user_id', '=', $user)->get();
        // devuelve los datos de ese usuario y sus precios
        return view('estudios.index', compact('estudios', 'levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = Level::All();
        return view('estudios.form', compact('levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Le dejará crear precios, hasta un maximo de 3
            $request->validate([
                'user_id' => 'required',
                'levels_id' => 'required|integer',
                'nota' => 'required|integer',
                'fechaFinalizacion' => 'required|date',
            ]);

            Study::create([
                'user_id' => $request->get('user_id'),
                'levels_id' => $request->get('levels_id'),
                'nota' => $request->get('nota'),
                'fechaFinalizacion' => $request->get('fechaFinalizacion'),
            ]);

            // Mensaje para indicar en index que se a creado con exito
            return Redirect::Route('estudios.index')->with('createMsj', 'Estudios Creados con Exito.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function show(Study $study)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function edit(Study $estudio)
    {
        $levels = Level::All();
        return view('estudios.form', compact('levels'))->with('estudio', $estudio);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Study $estudio)
    {
        $request->validate([
            'user_id' => 'required',
            'levels_id' => 'required|integer',
            'nota' => 'required|integer',
            'fechaFinalizacion' => 'required|date',
        ]);
        $estudio->user_id = $request['user_id'];
        $estudio->levels_id = $request['levels_id'];
        $estudio->nota = $request['nota'];
        $estudio->fechaFinalizacion = $request['fechaFinalizacion'];
        $estudio->update();

        // Mensaje para indicar en index que se a actualizado con exito
        return Redirect::Route('estudios.index')->with('updateMsj', 'Estudios Actualizados con Exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function destroy(Study $estudio)
    {
        $estudio->delete();

        // Mensaje para indicar en index que se a eliminado con exito
        return Redirect::Route('estudios.index')->with('errorMsj', 'Estudio Eliminado con Exito.');
    }
}
