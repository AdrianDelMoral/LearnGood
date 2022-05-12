<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{

    public function index()
    {
            $user = Auth::user()->id;
            $profeInfo = User::where('user_id', '=', $user);
            return view('Profesor.index', compact('profeInfo'));
    }
}
