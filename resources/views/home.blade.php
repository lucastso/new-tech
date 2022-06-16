@extends('layouts.interna')
@section('content')
    <div class="flex justify-between items-center w-full font-bold text-black-24 flex-wrap text-center">
        <template x-for="items in categorias">
            <p x-text="items" class="cursor-pointer"></p>
        </template>
    </div>

    <div class="w-full mt-10 gap-10 flex items-center">
        <section class="flex items-center justify-between bg-red-100">
            <img x-bind:src="data[0]?.imagem" alt="Post image" class="w-80">    
            <div class="flex flex-col gap-4">
                <h1 x-text="data[0]?.titulo"></h1>
                <p x-text="data[0]?.conteudo"></p>
                <div class="flex gap-2">
                    <p x-text="data[0]?.autor"></p>
                    <p x-text="data[0]?.categoria"></p>
                </div>
            </div>
        </section>
        <section class="flex items-center justify-between bg-red-100">
            <img x-bind:src="data[1]?.imagem" alt="Post image" class="w-80">    
            <div class="flex flex-col gap-4">
                <h1 x-text="data[1]?.titulo"></h1>
                <p x-text="data[1]?.conteudo"></p>
                <div class="flex gap-2">
                    <p x-text="data[1]?.autor"></p>
                    <p x-text="data[1]?.categoria"></p>
                </div>
            </div>
        </section>
    </div>

    <template x-for="post in data.slice(0, 3)">
    <section class="flex items-center justify-between bg-red-100">
            <img x-bind:src="post.imagem" alt="Post image" class="w-80">    
            <div class="flex flex-col gap-4">
                <h1 x-text="post.titulo"></h1>
                <p x-text="post.conteudo"></p>
                <div class="flex gap-2">
                    <p x-text="post.autor"></p>
                    <p x-text="post.categoria"></p>
                </div>
            </div>
        </section>
    </template>
@endsection
@section('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('main', () => ({
                data: [],
                api: axios.create(),
                categorias: [
                    'Tech',
                    'Elon',
                    'Musk',
                    'React',
                ],
    
                init() {
                    this.get();
                },

                get() {
                    this.api.get('{{route('api.posts', false)}}').then((response) => {
                        this.data = response.data;
                    });
                }
            }))
        })
    </script>
@endsection
