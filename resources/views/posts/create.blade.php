@extends('layouts.interna')
@section('content')
    <form class="flex flex-col" action="{{ route('registrar.post') }}" method="POST">
        @csrf
        <label class="font-bold xs:text-xs lg:text-base">Título</label>
        <input class="border-gray-600 border rounded h-10 mt-2" type="text" name="titulo">
        <label class="font-bold mt-6 xs:text-xs lg:text-base">Link para imagem</label>
        <input class ="border rounded border-gray-600 h-10 mt-2" type="text" name="imagem">
        <label class="font-bold mt-6 xs:text-xs lg:text-base">Conteúdo</label>
        <textarea class ="border rounded border-gray-600 h-40 mt-2 p-2" name="conteudo"></textarea>
        <label class="font-bold mt-6 xs:text-xs lg:text-base">Categoria</label>
        <input class="border rounded border-gray-600 w-36 h-10 mt-2" type="text" name="categoria">
        <button class="font-bold mt-12 xs:text-xs lg:text-base flex self-end xs:px-2 lg:px-4 xs:py-1 lg:py-2 border rounded border-black-24" type="submit">Enviar post para avaliação</button>
    </form>
@endsection
