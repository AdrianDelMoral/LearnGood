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
        return view('admin.platforms.index', compact('platforms'));
    }

    public function create()
    {
        return view('admin.platforms.form');
    }

    public function store(Request $request)
    {
        // $foto = $this->foto->store('/public/platformsImages');
        $request->validate([
            'nombre' => 'required|string|max:100',
            'Foto' => 'required|max:1000' // solo podrá subir una imagen por plataforma y que sea de un maximo de 100kb de peso
        ]);

        $image = $request->file('Foto');
        $filename = date('Y-m-d-H:i:s') . "-" . $image->getClientOriginalName();
        Platform::make($image->getRealPath())->resize(468, 249)->save('public/img/products/' . $filename);
        $hola = $request->Foto = 'img/products/' . $filename;
        dd($hola);
        /* dd($request->get('Foto'));
        $path = Storage::putFile('Foto',$request->file('Foto')); */
        /* if($request->hasFile('Foto')){
            if ($request->file('Foto')->isValid()) {
                $platform->Foto = "/imagenes/".$path;
            }
        } */

        /* '/imagenes/platformsImages' */
        Platform::create([
            'nombre' => $request->input['nombre'],
            /* 'Foto' => $path */
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
        return view('admin.platforms.form')->with('platform', $platform);
    }

    public function update(Request $request, Platform $platform)
    {
        $request->validate([
            'nombre' => 'required',
            'image' => 'required',
        ]);

        $platform->update();

        // Mensaje para indicar en index que se a actualizado con exito
        return Redirect::Route('admin.platforms.index')->with('updateMsj', 'Plataforma Actualizada con Exito.');
    }

    public function destroy(Platform $platform)
    {
        $platform->delete();

        // Mensaje para indicar en index que se a eliminado con exito
        return Redirect::Route('admin.platforms.index')->with('errorMsj', 'Plataforma Eliminada con Exito.');
    }
}
