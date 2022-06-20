@extends('layouts.interna')
@section('content')
<section x-data="avaliar()">
    <div class="grid grid-cols-3 gap-12 mt-10" x-show="data.length != 0">
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

    <p x-show="data.length == 0" class="font-bold text-center w-full mt-10">Nenhum post disponível para avaliar! :(</p>

</section>
@endsection
@section('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('avaliar', () => ({
                data: [],
                api: axios.create(),
    
                init() {
                    this.get();
                },

                get() {
                    this.api.get('{{route('api.posts.avaliar', false)}}').then((response) => {
                        this.data = response.data;
                        console.log(this.data);
                    });
                },

                sliceTexto(item) {
                    return item.slice(0, 60) + '...';
                }
            }))
        })
    </script>
@endsection