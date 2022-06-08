<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Order;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function show($id)
    {
        $Curso = Course::where('id', $id)->first();
        // return $Curso;

        // sacar los posts con el id del curso($posts->id)
        $posts = Post::where('courses_id', $id)->get();
        // return ['Curso', $Curso,'Posts', $posts];

        $status = Order::where([['user_id_alumno', Auth::user()->id], ['courses_id', $id]])->find(1);

        // return ['status', $status];
        $status =  $status == false;

        return view('postsStudentView.show', compact('posts', 'Curso', 'status'));
    }

    public function infoPost($id)
    {
        $post = Post::where('id', $id)->first();
        // return $post;

        return view('postsStudentView.infoPost', compact('post'));
    }

}
