@extends('layouts.interna')
@section('content')
    <form action="{{ route('registrar.post') }}" method="POST">
        @csrf
        <input type="text" name="titulo" class="border border-black">
        <input type="text" name="imagem" class="border border-black">
        <input type="text" name="conteudo" class="border border-black">
        <input type="text" name="autor" class="border border-black">
        <input type="text" name="categoria" class="border border-black">
        <button type="submit">Salvar</button>
    </form>
@endsection
