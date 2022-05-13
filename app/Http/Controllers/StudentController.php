<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $usersProfesor = User::where('role_id', '=', 'Profesor')->get();
        return view('alumno.index', compact('usersProfesor')); // Hacemos un compact, para poder pasarle a una vista una variable anteriormente creada de una tabla de la base de datos
    }

    public function create()
    {
        //
    }

    public function store($id)
    {
    }

    public function show($id)
    {
        $profeInfo = User::find($id);
        $prices = Price::find('user_id' == $id);
        return view('alumno.show', compact('profeInfo'));
    }

    public function edit($id)
    {
        //
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
