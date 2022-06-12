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

            <section class="mx-32 mt-10">
                <div class="flex justify-between items-center w-full font-bold text-black-24">
                    <template x-for="items in categorias">
                        <p x-text="items"></p>
                    </template>
                </div>

                <div class="lg:container lg:grid lg:grid-cols-3 sm:grid-cols-1 w-full mt-10">
                    <p class="col-span-2">a</p>
                    <p class="col-span-1">b</p>
                </div>

                <template x-for="post in data">
                    <section></section>
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
                        'Flutter',
                        'Laravel',
                        'JavaScript',
                        'Front-end',
                        'Back-end'
                    ],
        
                    init() {
                        this.get();
                    },

                    get() {
                        api.get('{{route('api.posts', false)}}').then((response) => {
                            this.data = reponse.data;
                        });
                    }
                }))
            })
        </script>
    </body>
</html>
