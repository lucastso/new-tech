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

    public function show($id)
    {
        $post = Posts::findOrFail($id);
        return view('posts.show', ['post' => $post]);
    }

    public function edit($id)
    {
        $post = Posts::findOrFail($id);
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, $id)
    {
        $post = Posts::findOrFail($id);

        $post->update([
            'titulo' => $request->titulo,
            'imagem' => $request->imagem,
            'conteudo' => $request->conteudo,
            'autor' => $request->autor,
            'categoria' => $request->categoria
        ]);
        return "post atualizado com sucesso!";
    }

    public function delete($id)
    {
        $post = Posts::findOrFail($id);
        return view('posts.delete', ['post' => $post]);
    }

    public function destroy($id)
    {
        $post = Posts::findOrFail($id);
        $post->delete();
        return "post excluido com sucesso!";
    }
}
