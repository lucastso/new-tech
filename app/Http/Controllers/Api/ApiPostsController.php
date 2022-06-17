<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts;

class ApiPostsController extends Controller
{
    public function index(Request $request)
    {   
        $data = Posts::query()
            ->select('posts.id', 'posts.titulo', 'posts.imagem', 'posts.conteudo', 'posts.autor', 'posts.categoria', 'users.name', 'users.profile_photo_path')
            ->join('users', 'posts.autor', '=', 'users.id')
            ->get()->toArray();

        return response()->json($data);
    }

    public function search(Request $request)
    {
        $texto = $request->query('texto');
        $search = Posts::query()
            ->select('posts.id', 'posts.titulo', 'posts.imagem', 'posts.conteudo', 'posts.autor', 'posts.categoria', 'users.name')
            ->join('users', 'posts.autor', '=', 'users.id')
            ->where('posts.titulo', 'like', '%' . $texto . '%')
            ->get()->toArray();

        return response()->json($search);
    } 
}
