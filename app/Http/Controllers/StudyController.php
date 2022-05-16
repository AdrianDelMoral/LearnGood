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

        // sacar los precios del profesor que esta actualmente logeado
        $estudios = Study::where('user_id', '=', $user)->get();
        $niveles = Level::get();
        // devuelve los datos de ese usuario y sus precios
        return view('estudios.index', compact('estudios', 'niveles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $niveles = Level::get();
        return view('estudios.form', compact('niveles'));
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
            'user_id' => 'required',
            'levels_id' => 'required',
            'nota' => 'required|integer|max:11|min:1',
            'fechaFinalizacion' => 'required|date'
        ]);

        $study = new Study();

        $study->user_id = $request->user_id;
        $study->levels_id = $request->get('levels_id');
        $study->nota = $request->nota;
        $study->fechaFinalizacion = $request->fechaFinalizacion;
        $study->save();

        // $level = $request->get("levels_id");
        // dd($level)
        // Study::create($request->only('user_id', $level, 'nota','fechaFinalizacion'));

        // Mensaje para indicar en index que se a creado con exito
        return Redirect::Route('estudios.index')->with('createMsj', 'Nivel de Estudios Creado con Exito.');
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
    public function edit(Study $study)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Study $study)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function destroy(Study $study)
    {
        $study->delete();

        // Mensaje para indicar en index que se a eliminado con exito
        return Redirect::Route('estudios.index')->with('errorMsj', 'Estudios Eliminados con Exito.');
    }
}
