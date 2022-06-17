@extends('layouts.interna')
@section('content')
<section x-data="userpost()">
    <div class="grid grid-cols-3 gap-12 mt-10" x-show="data.length != 0">
        <template x-for="post in data">
            <section class="flex items-start justify-between col-span-1 h-40 gap-3">
                <img x-bind:src="post.imagem" alt="Post image" class="w-56 h-40 object-cover rounded-lg">    
                <div class="flex flex-col gap-4 mt-1">
                    <h1 x-text="sliceTexto(post.titulo)" class="font-bold"></h1>
                    <p x-text="sliceTexto(post.conteudo)" class="text-sm"></p>
                    <div class="flex gap-2 text-sm items-center font-bold">
                        <p x-text="post.autor"></p>
                        <p class="py-1 px-2 border-2 border-black-24 rounded" x-text="post.categoria"></p>
                    </div>
                </div>
            </section>
        </template>
    </div>
    
    <p x-show="data.length == 0" class="font-bold text-center w-full">Você ainda não tem nenhum post!</p>

</section>
@endsection
@section('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('userpost', () => ({
                data: {!! json_encode($data) !!},
                api: axios.create(),

                sliceTexto(item) {
                    return item.slice(0, 60) + '...';
                }
            }))
        })
    </script>
@endsection
