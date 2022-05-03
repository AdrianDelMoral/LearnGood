<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Social;

class inicioController extends Controller
{
    public function index()
    {
        $users = User::All();// sacamos todos los usuarios, para después mostrar los que deseemos en cada vista
        $usersProfesor = User::All()->where('role_id', '=', 'Profesor' );
        $profesorLinks = Social::All();

        if(Auth::user()){ // Hacemos un compact, para poder pasarle a una vista una variable anteriormente creada de una tabla de la base de datos
            if(Auth::user()->role_id === 'Admin'){
                return view('Admin.index', compact('users'));
            }

            if(Auth::user()->role_id === 'Profesor'){
                // Hacemos un compact, para poder pasarle a una vista una variable anteriormente creada de una tabla de la base de datos
                return view('Profesor.index', compact('users'));
            }

            if(Auth::user()->role_id === 'Alumno'){
                // Hacemos un compact, para poder pasarle a una vista una variable anteriormente creada de una tabla de la base de datos
                return view('Alumno.index', compact(['usersProfesor', 'profesorLinks']));
            }
        }

        return view('home');
    }
}
