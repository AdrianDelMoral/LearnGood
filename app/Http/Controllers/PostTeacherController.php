<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Post;
use Illuminate\Http\Request;

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
        return view('postsTeacher.create');
    }

    public function store(Request $request)
    {
        //
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
