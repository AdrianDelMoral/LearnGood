<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PostTeacherController extends Controller
{

    public function index()
    {
        //
    }

    public function show($id)
    {
        $posts = Post::where('courses_id', $id)->get();
        // return $posts;
        $Curso = Course::where('id', $id)->first();
        // return $Curso;
        return view('postsTeacher.show', compact('posts', 'Curso'));
    }

    public function createPost($Curso)
    {
        return view('postsTeacher.create', compact('Curso'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        // return $input;
        $id = $request->get('courses_id');
        // return $id;
        // return $request->file('imagePost');
        // return $id;
        $request->validate([
            'titulo' => 'required|unique:posts|string|max:30',
            'entrada' => 'required|string',
            'contenidoPost' => 'required|string',
            'imagePost' => 'image',
            'video' => 'video'
        ]);

        if ($image = $request->file('imagePost')) {
            $destinationPath = 'imagenes/postImages';
            $profileImage = date('dmYHi') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['imagePost'] = "$profileImage";
        }

        // return $id;
        Post::create($input);

        $posts = Post::where('courses_id', $id)->get();
        // return $posts;
        $Curso = Course::where('id', $id)->first();
        // return $Curso;
        // Mensaje para indicar en index que se a creado con exito
        return redirect("profesor/cursosposts/".$id)->with('createMsj', 'Post Creado con Exito.');
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
