<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function getUserPosts()
    {
        $data = Posts::query()
            ->select('*')
            ->where('autor', Auth::user()->id)
            ->get()->toArray();

        return view('posts.userpost', ['data' => $data]);
    }

    public function store(Request $request)
    {
        Posts::create([
            'titulo' => $request->titulo,
            'imagem' => $request->imagem,
            'conteudo' => $request->conteudo,
            'autor' => Auth::user()->name,
            'categoria' => $request->categoria
        ]);
        return view('home');
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
        $user = $request->user();

        if($user->can('update', $post)){
            $post->update([
                'titulo' => $request->titulo,
                'imagem' => $request->imagem,
                'conteudo' => $request->conteudo,
                'autor' => $request->autor,
                'categoria' => $request->categoria
            ]);
            return "post atualizado com sucesso!";
        }
        
        return "vc n pode atualizar esse post, ele n é seu";
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
