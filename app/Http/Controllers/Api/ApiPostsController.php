<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\User;

class ApiPostsController extends Controller
{
    public function index(Request $request)
    {   
        $data = Posts::query()
            ->select('posts.id', 'posts.titulo', 'posts.imagem', 'posts.conteudo', 'posts.autor', 'posts.categoria', 'users.name', 'users.profile_photo_path')
            ->distinct('posts.id')
            ->join('users', 'posts.autor', '=', 'users.id')
            ->where('posts.estado', 2)
            ->get()->toArray();

        return response()->json($data);
    }

    public function search(Request $request)
    {
        $texto = $request->query('texto');
        $search = Posts::query()
            ->select('posts.id', 'posts.titulo', 'posts.imagem', 'posts.conteudo', 'posts.autor', 'posts.categoria', 'users.name')
            ->distinct('posts.id')
            ->join('users', 'posts.autor', '=', 'users.id')
            ->where('posts.titulo', 'like', '%' . $texto . '%')
            ->where('posts.estado', 2)
            ->get()->toArray();

        return response()->json($search);
    }

    public function avaliar(Request $request)
    {   
        $data = Posts::query()
            ->select('posts.id', 'posts.titulo', 'posts.imagem', 'posts.conteudo', 'posts.autor', 'posts.categoria', 'users.name', 'users.profile_photo_path')
            ->distinct('posts.id')
            ->join('users', 'posts.autor', '=', 'users.id')
            ->where('posts.estado', '1')    
            ->get()->toArray();

        return response()->json($data);
    }

    public function avaliado(Request $request)
    {
        $id = $request->id;
        $post = Posts::findOrFail($id)->update([
            'estado' => 2
        ]);
    }

    public function destruido(Request $request)
    {
        $id = $request->id;
        $post = Posts::findOrFail($id)->delete();
    }

    public function atualizar(Request $request, $id)
    {
        $post = Posts::findOrFail($id)->update([
            'estado' => 2
        ]);
    }
}
