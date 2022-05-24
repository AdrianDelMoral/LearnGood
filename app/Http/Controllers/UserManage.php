<?php

namespace App\Http\Controllers;

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
        if ($id->role_id == 'Profesor') {
            // return ['Profesor',$id];
            return view('UsersList.edit', compact('id'));
        } else if ($id->role_id == 'Alumno') {
            // return ['Alumno',$id];
            return view('UsersList.edit', compact('id'));
        } else if ($id->role_id == 'Admin') {
            return view('UsersList.edit', compact('id'));
        }
    }

    public function update(Request $request, $id)
    {
        //
        $usuario = User::findOrFail($id);

        if($request->role_id == "Profesor"){
            $usuario -> nombre = $request->nombre;
            $usuario -> apellidos = $request->apellidos;
            $usuario -> idioma = $request->idioma;
            $usuario -> descripcion = $request->descripcion;
            $usuario->save();
        }
        if($request->role_id == "Alumno"){
            $usuario -> nombre = $request->nombre;
            $usuario -> apellidos = $request->apellidos;
            $usuario->save();
        }


        return redirect(route('manageusers.index'))->with('warningMsj', 'Usuario Editado con Exito.');

    }

    public function destroy($id)
    {
        $borrarUser = User::findOrFail($id);
        $borrarUser->delete();

        $users = User::paginate(9);
        //return view('usersList.index', compact('users'))->with('errorMsj', 'Usuario Eliminado con Exito.');
        return back()->with('errorMsj', 'Usuario Eliminado con Exito.');


        // return Redirect::Route('usersList.index', compact('users'))->with('errorMsj', 'Usuario Eliminado con Exito.');
    }
}
