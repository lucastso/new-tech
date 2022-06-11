<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class PostsController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        Posts::create([
            'titulo' => $request->titulo,
            'imagem' => $request->imagem,
            'conteudo' => $request->conteudo,
            'autor' => $request->autor,
            'categoria' => $request->categoria
        ]);
        return "post criado com sucesso!";
    }
}
