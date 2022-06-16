@extends('layouts.interna')
@section('content')
    <form action="{{ route('destroy.post', ['id' => $posts->id) }}" method="POST">
        @csrf
        <input type="text" name="titulo" class="border border-black">
        <input type="text" name="imagem" class="border border-black">
        <input type="text" name="conteudo" class="border border-black">
        <input type="text" name="categoria" class="border border-black">
        <button type="submit">Destruir</button>
    </form>
@endsection
