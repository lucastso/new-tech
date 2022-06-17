@extends('layouts.interna')
@section('content')
<section x-data="main()">
    <div class="flex justify-between items-center w-full font-bold text-black-24 flex-wrap text-center">
        <template x-for="items in categorias">
            <p x-text="items" class="cursor-pointer"></p>
        </template>
    </div>

    <div class="grid grid-cols-3 gap-12 mt-10">
        <template x-for="item in data">
            <a class="flex items-start justify-between col-span-1 h-40 gap-3 cursor-pointer" x-bind:href="'/posts/' + item.id" id="item.id">
                <img x-bind:src="item.imagem" alt="Post image" class="w-56 h-40 object-cover rounded-lg">    
                <div class="flex flex-col gap-4 mt-1">
                    <h1 x-text="sliceTexto(item.titulo)" class="font-bold"></h1>
                    <p x-text="sliceTexto(item.conteudo)" class="text-sm text-gray-600"></p>
                    <div class="flex gap-2 text-sm items-center font-bold">
                        <p x-text="item.name"></p>
                        <p class="py-1 px-2 border-2 border-black-24 rounded" x-text="item.categoria"></p>
                    </div>
                </div>
            </a>
        </template>
    </div>

</section>
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
                    this.getText();
                },

                get() {
                    this.api.get('{{route('api.posts', false)}}').then((response) => {
                        this.data = response.data;
                    });
                },

                sliceTexto(item) {
                    return item.slice(0, 60) + '...';
                },

                getText() {
                    let el = document.getElementById("texto");
                    let self = this;
                    el.addEventListener("keydown", function(event) {
                        if (event.key === "Enter") {
                            event.preventDefault();
                            self.api.get('{{route('api.search', false)}}?texto=' + el.value)
                            .then((response) => {
                                self.data = response.data;
                            });
                        }
                    });
                }
            }))
        })
    </script>
@endsection
