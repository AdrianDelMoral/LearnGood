<?php

namespace App\Http\Controllers;

use App\Models\User;

class StudentController extends Controller
{
    public function index()
    {
        $usersProfesor = User::where('role_id', '=', 'Alumno' )->get();
        return view('Alumno.index', compact('usersProfesor'));// Hacemos un compact, para poder pasarle a una vista una variable anteriormente creada de una tabla de la base de datos
    }

    public function show()
    {
    }
}
