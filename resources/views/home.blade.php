<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>New Tech</title>
        <link rel="stylesheet" href="{{mix('css/app.css')}}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Poppins', sans-serif;
            }
        </style>
    </head>
    <body>
        <section x-data="main">
            <x-nav></x-nav>

            <section class="w-full sm:mx-6 lg:mx-32 mt-10">
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
            </section>
        </section>

        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
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
    </body>
</html>
