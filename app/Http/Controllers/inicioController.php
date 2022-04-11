<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class inicioController extends Controller
{
    public function index()
    {
        if(Auth::user()){
            if(Auth::user()->role_id === 'Admin'){
                return view('index.Admin');
            }

            if(Auth::user()->role_id === 'Profesor'){
                return view('Profesor.index');
            }

            if(Auth::user()->role_id === 'Alumno'){
                return view('Alumno.index');
            }
        }

        return view('auth.login');
    }
}
