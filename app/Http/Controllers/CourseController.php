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
        // usuario conectado actualmente
        $user = Auth::user()->id;

        // sacar los cursos del profesor que esta actualmente logeado
        $cursos = Course::where('studies_id', $user)->get();
        // devuelve los datos de ese usuario y sus cursos
        return view('cursos.index', compact('cursos', 'user'));
    }

    public function create()
    {
        $profeId = Auth::user()->id; // devuelve el id del usuario actual que es profesor
        $estudios = Study::get(); // devuelve todos los estudios
        // return $profeId;
        //return $estudios;
        $estudiosProfe = Study::where('user_id', '=', $profeId)->get();
        // return $estudiosProfe;
        if(isset($estudiosProfe) ){// SI NO TIENE DEVUELVE FALSE
            return Redirect::Route('cursos.index')->with('errorMsj', 'Prueba a añadir Estudios Primero.');
        }
        return view('cursos.create', compact('estudiosProfe'));
    }


    public function store(Request $request)
    {
        // Le dejará crear cursos, hasta un maximo de 3
        $request->validate([
            'studies_id' => 'required',
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
        return view('cursos.edit')->with('curso', $curso);
    }

    public function update(Request $request, Course $curso)
    {
        $request->validate([
            'studies_id' => 'required',
            'nombreCurso' => 'required|string|max:100',
            'precio' => 'required|integer',
            'descripcion' => 'required|string|max:200',
        ]);
        $curso->user_id = $request['user_id'];
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
