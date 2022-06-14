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
        <section x-data="posts">
            <x-nav></x-nav>

            <section class="mx-32 mt-10">

                <form action="{{ route('update.post', ['id' => $produto->id) }}" method="POST">
                    @csrf
                    <input type="text" name="titulo" class="border border-black">
                    <input type="text" name="imagem" class="border border-black">
                    <input type="text" name="conteudo" class="border border-black">
                    <input type="text" name="autor" class="border border-black">
                    <input type="text" name="categoria" class="border border-black">
                    <button type="submit">Salvar</button>
                </form>
            </section>
        </section>

        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('posts', () => ({
        
                    init() {
                        
                    },
                }))
            })
        </script>
    </body>
</html>
