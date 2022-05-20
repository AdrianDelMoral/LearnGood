<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Order;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    public function index()
    {
    }

    public function create()
    {
        //
    }

    public function createPost(Course $Curso)
    {
        return view('posts.create', compact('Curso'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'courses_id' => 'required',
            'titulo' => 'required',
            'entrada' => 'required',
        ]);

        Post::create([
            'courses_id' => $request->get('courses_id'),
            'titulo' => $request->get('titulo'),
            'entrada' => $request->get('entrada'),
        ]);

        $Curso = Course::where('id',$request->get('courses_id'))->first();
        // sacar los posts con el id del curso($posts->id)
        // return $Curso;

        $posts = Post::where('courses_id', $Curso->id)->get();

        return view('posts.show', compact('Curso', 'posts'))->with('createMsj', 'Pedido Creado con Exito.');
    }

    // Muestra todos los posts de el pedido en cuestión
    public function showPosts(Course $Curso)
    {

        if (Auth::user()->role_id == 'Profesor' || Auth::user()->role_id == 'Admin') {

            // sacar los posts con el id del curso($posts->id)
            $posts = Post::where('courses_id', $Curso->id)->get();
            //return $posts;

            return view('Posts.show', compact('Curso', 'posts'));
        }

        if (Auth::user()->role_id == 'Alumno') {

            // sacar los posts con el id del curso($posts->id)
            $posts = Post::where('courses_id', $Curso->id)->get();
            //return $posts;

            $status = Order::where([['user_id_alumno', Auth::user()->id], ['courses_id', $Curso->id]])->find(1);

            return view('Posts.show', compact('Curso', 'posts'));
        }
    }

    public function infoPost(Post $post)
    {
    }

    public function edit(Post $post)
    {
    }

    public function update(Request $request, Post $post)
    {
    }

    public function destroy(Post $post)
    {
    }
}
