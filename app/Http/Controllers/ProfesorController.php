<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfesorController extends Controller
{

    public function index($id)
    {
        return view('Profesor.index', compact('id'));
    }
}
