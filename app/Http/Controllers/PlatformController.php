<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;

class PlatformController extends Controller
{
    public function index()
    {
        $platforms = Platform::All();
        return view('platforms.index', compact('platforms'));
    }

    public function create()
    {
        return view('platforms.form');
    }

    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required|string|max:100',
            'platformImage' => 'required|max:1000|mimes:svg' // solo podrá subir una imagen por plataforma y que sea de un maximo de 100kb de peso
        ]);

        $newImageName = time() . '-' . $request->get('nombre') . '.' . $request->platformImage->extension();
        // dd($newImageName);

        $request->platformImage->move(public_path('imagenes/platformsImages'), $newImageName);

        // dd($newImageName);

        Platform::create([
            'nombre' => $request->input('nombre'),
            'platformImage' => $newImageName
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
        return view('platforms.form')->with('platform', $platform);
    }

    public function update(Request $request, Platform $platform)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'platformImage' => 'required|max:1000|mimes:svg' // solo podrá subir una imagen por plataforma y que sea de un maximo de 100kb de peso
        ]);

        // dd($newImageName);


        /* ----------------------------------------------------------------------------------------  */

        $platform = Platform::find($platform);
        $destinationOlder = 'imagenes/platformsImages' . $platform->platformImage;
        File::delete($destinationOlder);

        // Mensaje para indicar en index que se a creado con exito
        $request->validate([
            'nombre' => 'required',
            'image' => 'required',
        ]);

        $newImageName = time() . '-' . $request->get('nombre') . '.' . $request->platformImage->extension();
        $request->platformImage->move(public_path('imagenes/platformsImages'), $newImageName);
        $platform->update();

        // Mensaje para indicar en index que se a actualizado con exito
        return Redirect::Route('platforms.index')->with('updateMsj', 'Plataforma Actualizada con Exito.');
    }

    public function destroy(Platform $platform)
    {
        $platform->delete();

        // Mensaje para indicar en index que se a eliminado con exito
        return Redirect::Route('platforms.index')->with('errorMsj', 'Plataforma Eliminada con Exito.');
    }
}
