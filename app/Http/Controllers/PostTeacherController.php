<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
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

        $Curso = Course::where('id', $id)->first();

        return view('postsTeacher.show', compact('posts', 'Curso'));
    }
    public function infoPost($id)
    {
        $post = Post::where('id', $id)->first();

        return view('postsTeacher.infoPost', compact('post'));
    }

    public function createPost($Curso)
    {
        return view('postsTeacher.create', compact('Curso'));
    }

    public function store(PostRequest $request)
    {
        $input = $request->all();

        $id = $request->get('courses_id');

        $request->validate([
            'titulo' => 'required|unique:posts|string|max:30',
            'entrada' => 'required|string',
            'contenidoPost' => 'required|string',
            'imagePost' => 'image',
        ]);

        if ($image = $request->file('imagePost')) {
            $destinationPath = 'imagenes/postImages';
            $profileImage = date('dmYHi') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['imagePost'] = "$profileImage";
        }

        if ($video = $request->file('video')) {
            $destinationPath = 'postVideos';
            $videoPosts = date('dmYHi') . "." . $video->getClientOriginalExtension();
            $video->move($destinationPath, $videoPosts);
            $input['video'] = "$videoPosts";
        }

        Post::create($input);

        return redirect("profesor/cursosposts/".$id)->with('createMsj', 'Post Creado con Exito.');
    }

    public function edit($cursospost)
    {
        // return $cursospost;
        $post = Post::where('id', $cursospost)->first();
        // return $cursospost;
        return view('postsTeacher.edit', compact('post'));
    }

    public function update(PostRequest $request, $id)
    {
        $input = $request->all();

        $id = $request->get('courses_id');

        $request->validate([
            'titulo' => 'required|string|max:30',
            'entrada' => 'required|string',
            'contenidoPost' => 'required|string',
            'imagePost' => 'image',
        ]);

        if ($image = $request->file('imagePost')) {
            $destinationPath = 'imagenes/postImages';
            $profileImage = date('dmYHi') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['imagePost'] = "$profileImage";
        }

        if ($video = $request->file('video')) {
            $destinationPath = 'postVideos';
            $videoPosts = date('dmYHi') . "." . $video->getClientOriginalExtension();
            $video->move($destinationPath, $videoPosts);
            $input['video'] = "$videoPosts";
        }

        $id->update($input);

        return redirect("profesor/cursosposts/".$id)->with('createMsj', 'Post Actualizado con Exito.');
    }

    public function destroy($id)
    {
        $borrarPost = Post::findOrFail($id);
        $borrarPost->delete();

        return back()->with('errorMsj', 'Post Eliminado con Exito.');
    }
}
