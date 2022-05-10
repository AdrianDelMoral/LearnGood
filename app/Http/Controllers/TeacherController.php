<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function index()
    {
        $usersProfesor = User::All()->where('role_id', '=', 'Profesor' );
        return view('Profesor.index', compact('users'));
    }
}
