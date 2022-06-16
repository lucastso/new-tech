@extends('layouts.interna')
@section('content')
    <form method="GET">
        @csrf
        <input type="text" name="titulo" class="border border-black">
        <input type="text" name="imagem" class="border border-black">
        <input type="text" name="conteudo" class="border border-black">
        <input type="text" name="categoria" class="border border-black">
        <button type="submit">Editar</button>
    </form>
@endsection
