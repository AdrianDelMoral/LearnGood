<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Experience;
use App\Models\Price;

class inicioController extends Controller
{
    public function index()
    {

        if(Auth::user()){ // Hacemos un compact, para poder pasarle a una vista una variable anteriormente creada de una tabla de la base de datos
            if(Auth::user()->role_id === 'Admin'){
                $users = User::All(); // sacamos todos los usuarios, para después mostrar los que deseemos en cada vista
                return view('Admin.index', compact('users'));
            }

            if(Auth::user()->role_id === 'Profesor'){
                $precios = Price::All();
                // $experiencia = Experience::All();
                // Hacemos un compact, para poder pasarle a una vista una variable anteriormente creada de una tabla de la base de datos
                return view('Profesor.index', compact('precios'));
            }

            if(Auth::user()->role_id === 'Alumno'){
                $usersProfesor = User::All()->where('role_id', '=', 'Profesor' );
                return view('Alumno.index', compact('usersProfesor'));// Hacemos un compact, para poder pasarle a una vista una variable anteriormente creada de una tabla de la base de datos
            }
        }

        return view('home');
    }
}
