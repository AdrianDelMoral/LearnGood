<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserManageRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Livewire\WithPagination;

class UserManage extends Controller
{
    use WithPagination;

    public function index()
    {
        // sacamos todos los usuarios, para mostrarselos al administrador
        $users = User::paginate(9);
        return view('usersList.index', compact('users'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $id = User::where('id', $id)->get();
        foreach ($id as $key => $value) {
            $devolver = $value;
        }
        $id = $devolver;
        return view('UsersList.edit', compact('id'));
    }

    public function update(UserManageRequest $request, $id)
    {

        $usuario = User::findOrFail($id);

        if($request->role_id == "Profesor"){
            $request->validate([
                'nombre' => 'required|string',
                'apellidos' => 'required|string',
                'idioma' => 'required|string',
                'descripcion' => 'required|string|max:150',
            ]);

            $usuario -> nombre = $request->nombre;
            $usuario -> apellidos = $request->apellidos;
            $usuario -> idioma = $request->idioma;
            $usuario -> descripcion = $request->descripcion;
            $usuario->save();
        }

        if($request->role_id == "Alumno"){
            $request->validate([
                'nombre' => 'required|string',
                'apellidos' => 'required|string',
            ]);
            $usuario -> nombre = $request->nombre;
            $usuario -> apellidos = $request->apellidos;
            $usuario->save();
        }


        return redirect(route('manageusers.index'))->with('updateMsj', 'Usuario Actualizado con Exito.');
    }

    public function destroy($id)
    {
        $borrarUser = User::findOrFail($id);
        $borrarUser->delete();

        return back()->with('errorMsj', 'Usuario Eliminado con Exito.');

    }
}
