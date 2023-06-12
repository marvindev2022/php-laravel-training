<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return response()->json($posts);
    }

    public function store(Request $request)
    {
        // Lógica para criar um novo post
    }

    public function show($id)
    {
        $post = Post::find($id);
        return response()->json($post);
    }

    public function update(Request $request, $id)
    {
        // Lógica para atualizar um post existente
    }

    public function destroy($id)
    {
        // Lógica para excluir um post
    }
}
