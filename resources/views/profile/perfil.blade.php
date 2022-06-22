@extends('layouts.interna')
@section('content')
    <form class="flex flex-col" action="{{ route('update.perfil', ['id' => $user->id]) }}" method="POST">
    @csrf
        <label class="font-bold xs:text-xs lg:text-base">*Nome</label>
        <input class="border-gray-600 border rounded h-10 mt-2" type="text" name="name" value="{{$user->name}}">
        <label class="font-bold mt-6 xs:text-xs lg:text-base">*E-mail</label>
        <input class ="border rounded border-gray-600 h-10 mt-2" type="text" name="email" value="{{$user->email}}">
        <label class="font-bold mt-6 xs:text-xs lg:text-base">*Nova senha</label>
        <input class ="border rounded border-gray-600 h-10 mt-2" type="text" name="password">
        <label class="font-bold mt-6 xs:text-xs lg:text-base">*Link para imagem</label>
        <input class ="border rounded border-gray-600 h-10 mt-2" type="text" name="profile_photo_path" value="{{$user->profile_photo_path}}">
        <button class="font-bold mt-12 xs:text-xs lg:text-base flex self-end xs:px-2 lg:px-4 xs:py-1 lg:py-2 border rounded border-black-24" type="submit">Atualizar perfil</button>
    </form>
@endsection
