<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            'autor' => Auth::user()->id,
            'estado' => 1,
            'categoria' => $request->categoria
        ]);
        return redirect('/');
    }

    public function show($id)
    {
        $post = Posts::query()
        ->select('posts.id', 'posts.titulo', 'posts.imagem', 'posts.conteudo', 'posts.autor', 'posts.categoria', 'users.name', 'users.profile_photo_path', 'posts.created_at', 'posts.estado')
        ->join('users', 'posts.autor', '=', 'users.id')
        ->where('posts.id', $id)
        ->get()->toArray();

        $user = Auth::user();

        return view('posts.show', ['post' => $post, 'user' => $user]);
    }

    public function edit($id)
    {
        $post = Posts::findOrFail($id);
        if(Auth::user()->id == $post->autor) {
            return view('posts.update', ['post' => $post]);
        } else {
            return redirect('/');
        }
    }

    public function update(Request $request, $id)
    {
        $post = Posts::findOrFail($id);

        $post->update([
            'titulo' => $request->titulo,
            'imagem' => $request->imagem,
            'conteudo' => $request->conteudo,
            'autor' => Auth::user()->id,
            'estado' => $post->estado,
            'categoria' => $request->categoria
        ]);

        return redirect('/');
    }

    public function perfil($id)
    {
        $user = User::findOrFail($id);
        if(Auth::user()->id == $user->id) {
            return view('profile.perfil', ['user' => $user]);
        } else {
            return redirect('/');
        }
    }

    public function updatePerfil(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => Auth::user()->level,
            'profile_photo_path' => $request->profile_photo_path
        ]);

        return redirect('/');
    }

    public function destroy(Request $request)
    {
        $id = $request->query('id');
        $post = Posts::findOrFail($id);
        $post->delete();
    }

    public function avaliar()
    {
        return view('posts.avaliar');
    }
}
