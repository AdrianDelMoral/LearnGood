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

        if(Auth::user()){
            if(Auth::user()->role_id === 'Admin'){
                return view('Admin.index');
            }

            if(Auth::user()->role_id === 'Profesor'){
                return view('Profesor.inicio');
            }

            if(Auth::user()->role_id === 'Alumno'){
                return view('Alumno.inicio');
            }
        }

        return view('home');
    }
}
