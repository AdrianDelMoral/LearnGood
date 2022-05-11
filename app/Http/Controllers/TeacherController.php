<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{

    public function index()
    {
        if(Auth::user()->role_id === 'Profesor'){
            $usersProfesor = User::All()->where('role_id', '=', 'Profesor' );
            return view('Profesor.index', compact('users'));
        }
        return view('/');
    }
}
