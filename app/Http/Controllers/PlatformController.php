<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class PlatformController extends Controller
{
    public function index()
    {
        $platforms = Platform::All();
        return view('platforms.index', compact('platforms'));
    }

    public function create()
    {
        return view('platforms.create');
    }

    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'nombre' => 'required|string|max:30',
            'platformURL' => 'required|url',
            'platformImage' => 'required|image|mimes:svg|dimensions:max_width=16|max_height=16' // solo podrá subir una imagen por plataforma y que sea de un maximo de 100kb de peso
        ]);

        $newImageName = time().'-'.$request->nombre . '.' .$request->platformImage->extension();

        $request->platformImage->move(public_path('imagenes/platformImages'), $newImageName);

        //return $request;

        Platform::create([
            'nombre' => $request->get('nombre'),
            'platformImage' => $newImageName,
            'platformURL' => $request->get('platformURL')
        ]);

        // Mensaje para indicar en index que se a creado con exito
        return Redirect::Route('platforms.index')->with('createMsj', 'Plataforma Creada con Exito.');
    }

    public function show(Platform $platform)
    {
        //
    }

    public function edit(Platform $platform)
    {
        return view('platforms.edit')->with('platform', $platform);
    }

    public function update(Request $request, Platform $platform)
    {
        $request->validate([
            'nombre' => 'required',
            'platformURL' => 'required',
            'platformImage' => 'required|image|mimes:svg|dimensions:width=16,height=16',
        ]);


        $newImageName = time().'-'.$request->nombre . '.' .$request->platformImage->extension();

        $request->platformImage->move(public_path('imagenes/platformImages'), $newImageName);

        $platform->update();

        // Mensaje para indicar en index que se a actualizado con exito
        return Redirect::Route('platforms.index')->with('updateMsj', 'Plataforma Actualizada con Exito.');
    }

    public function destroy(Platform $platform)
    {
        Platform::findOrFail($platform)->delete();
        // $platform->delete();

        // Mensaje para indicar en index que se a eliminado con exito
        return Redirect::Route('platforms.index')->with('errorMsj', 'Plataforma Eliminada con Exito.');
    }
}
