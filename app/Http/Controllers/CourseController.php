<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Study;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Redirect;
use Monolog\Handler\IFTTTHandler;

class CourseController extends Controller
{
    public function index()
    {
        $cursos = Course::whereHas('studies', function ($query) {
            $query->where('user_id', Auth::user()->id);
        })->get();

        // $user = Auth::user();
        // devuelve los datos de ese usuario y sus cursos
        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        $user = Auth::user()->id;
        $estudios = Study::get(); // devuelve todos los estudios
        $estudiosProfe = Study::where('user_id', '=', $user)->get();

        if (!$estudiosProfe->count() == 0) { // SI NO TIENE Estudios ( 0 ), no puede crear cursos
            return view('cursos.create', compact('estudiosProfe'));
        }

        return Redirect::Route('cursos.index')->with('errorMsj', 'Prueba a añadir Estudios Primero.');
    }


    public function store(Request $request)
    {
        // dd($request->input());
        // Le dejará crear cursos, hasta un maximo de 3
        $request->validate([
            'nombreCurso' => 'required|string|max:30',
            'precio' => 'required|integer',
            'descripcion' => 'required|string',
        ]);

        Course::create($request->only('studies_id', 'nombreCurso', 'precio', 'descripcion'));

        // Mensaje para indicar en index que se a creado con exito
        return Redirect::Route('cursos.index')->with('createMsj', 'Curso Creado con Exito.');
    }

    public function show(Course $curso)
    {
    }

    public function edit(Course $curso)
    {
        $estudiosProfe = Study::where('user_id', '=', Auth::user()->id)->get();

        return view('cursos.edit', compact('estudiosProfe'))->with('curso', $curso);
    }

    public function update(Request $request, Course $curso)
    {
        $request->validate([
            'studies_id' => 'required',
            'nombreCurso' => 'required|string|max:100',
            'precio' => 'required|integer',
            'descripcion' => 'required|string|max:200',
        ]);

        $curso->studies_id = $request['studies_id'];
        $curso->nombreCurso = $request['nombreCurso'];
        $curso->precio = $request['precio'];
        $curso->descripcion = $request['descripcion'];
        $curso->update();

        // Mensaje para indicar en index que se a actualizado con exito
        return Redirect::Route('cursos.index')->with('updateMsj', 'Curso Actualizado con Exito.');
    }

    public function destroy(Course $curso)
    {
        $curso->delete();

        // Mensaje para indicar en index que se a eliminado con exito
        return Redirect::Route('cursos.index')->with('errorMsj', 'Curso Eliminado con Exito.');
    }
}
