<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlatformRequest;
use App\Models\Platform;
use Faker\Core\File;
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

    public function store(PlatformRequest $request)
    {
        // return $request;
        $request->validate([
            'nombre' => 'required|unique:platforms|string|max:30',
            'platformURL' => 'required|url',
            'platformImage' => 'required|image|mimes:svg|dimensions:width=16,height=16' // solo podrá subir una imagen por plataforma y que sea de un maximo de 100kb de peso
        ]);

        $input = $request->all();

        /* Bueno: YmdHis */
        /* siHdmY */
        if ($image = $request->file('platformImage')) {
            $destinationPath = 'imagenes/platformImages';
            $profileImage = date('dmYHi') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['platformImage'] = "$profileImage";
        }

        Platform::create($input);

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
            'nombre' => 'string',
            'platformURL' => 'url',
            'platformImage' => 'image|mimes:svg|dimensions:width=16,height=16',
        ]);

        $input = $request->all();



        if ($image = $request->file('platformImage')) {
            $destinationPath = 'imagenes/platformImages';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['platformImage'] = "$profileImage";
        } else {
            unset($input['platformImage']);
        }

        $platform->update($input);

        // Mensaje para indicar en index que se a actualizado con exito
        return Redirect::Route('platforms.index')->with('updateMsj', 'Plataforma Actualizada con Exito.');
    }

    public function destroy(Platform $platform)
    {
        $platform->delete();
        // $platform->delete();

        // Mensaje para indicar en index que se a eliminado con exito
        return Redirect::Route('platforms.index')->with('errorMsj', 'Plataforma Eliminada con Exito.');
    }
}
