<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        // return $id;
        $id = User::where('id',$id)->find();
        if ($id->role_id == 'Profesor') {
            return ['Profesor',$id];
            return view('UsersList.edit_Profesor', compact('id'));
        } else {
            return ['Alumno',$id];
            return view('UsersList.edit_Alumno', compact('id'));
        }
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
