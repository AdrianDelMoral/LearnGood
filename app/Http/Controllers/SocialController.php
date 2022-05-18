<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SocialController extends Controller
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

        $platforms = Platform::get();
        // sacar los precios del profesor que esta actualmente logeado
        $socials = Social::where('user_id', '=', $user)->get();
        // devuelve los datos de ese usuario y sus precios
        return view('socials.index', compact('socials', 'platforms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $platforms = Platform::All();

        if (!$platforms->count() == 0) { // SI NO HAY CREADAS plataformas ( 0 ), no puede crear una Red Social
            return view('socials.create', compact('platforms'));
        }

    return Redirect::Route('socials.index')->with('warningMsj', 'Aun no hay redes Sociales disponibles Pronto se añadirán.');
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
            'platform_id' => 'required|integer',
            'username' => 'required|string|max:25',
        ]);

        Social::create([
            'user_id' => $request->get('user_id'),
            'platform_id' => $request->get('platform_id'),
            'username' => $request->get('username'),
        ]);

        // Mensaje para indicar en index que se a creado con exito
        return Redirect::Route('socials.index')->with('createMsj', 'Red Social Creada con Exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function show(Social $social)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function edit(Social $social)
    {
        $platforms = Platform::All();
        return view('socials.edit', compact('platforms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Social $social)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function destroy(Social $social)
    {
        //
    }
}
