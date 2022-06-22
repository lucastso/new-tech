@extends('layouts.interna')
@section('content')
<section x-data="show()">
    <section class="fixed inset-0 bg-black bg-opacity-50 overflow-y-auto h-full w-full" x-show="showModal == true">
        <div class="relative top-1/2 mx-auto p-6 xs:w-2/3 lg:w-1/3 rounded bg-white" x-show="showModal == true">
            <div class="flex justify-between items-center">
                <p class="xs:text-xs lg:text-base">Tem certeza que você deseja excluir o post?</p> 
                <p class="font-bold cursor-pointer" x-on:click="showModal = false">X</p>
            </div>
            <div class="flex justify-end w-full items-center gap-4 mt-10" x-show="data[0].autor == user.id">
                <a x-on:click="deletado()" class="xs:py-1 lg:py-2 xs:px-2 lg:px-4 border-2 border-red-500 rounded bg-red-200 text-red-500 font-bold cursor-pointer xs:text-xs: lg:text-base">Excluir</a>
            </div>
        </div>
    </section>

    <section>
        <div class="flex justify-between w-full xs:items-start lg:items-center">
            <div class="flex gap-1 xs:items-start lg:items-center xs:flex-col lg:flex-row">
                <h1 x-text="data[0].titulo" class="font-bold xs:text-sm lg:text-lg"></h1>
                <span class="text-sm text-gray-600 xs:hidden lg:block">-</span>
                <p x-text="getDate(data[0].created_at)" class="text-sm text-gray-600"></p>
                @if($user->level == 1)
                <div class="flex items-center justify-center gap-2 ml-4" x-show="data[0].estado == 1">
                    <p class="px-1 border-2 border-green-500 rounded bg-green-200 text-green-500 font-bold cursor-pointer text-xs" x-on:click="avaliado(2)">aceitar</p>
                    <p class="px-1 border-2 border-red-500 rounded bg-red-200 text-red-500 font-bold cursor-pointer text-xs" x-on:click="deletado()">recusar</p>
                </div>
                @endif
            </div>
            <div class="flex items-center font-bold xs:gap-0 lg:gap-4">
                <p x-text="data[0].name" class="xs:text-xs lg:text-base"></p>
                <img x-bind:src="data[0].profile_photo_path ? data[0].profile_photo_path : '/user.png'" alt="user image" class="rounded-full h-10 w-10 object-cover">
            </div>
        </div>
        <img x-bind:src="data[0].imagem" alt="post image" class="w-full xs:h-40 lg:h-80 object-cover mt-6 rounded"  id="image">
        <p x-text="data[0].conteudo" class="mt-6 xs:text-xs lg:text-base"></p>

        <div class="flex justify-between w-full items-center gap-4 xs:mt-4 lg:mt-10" x-show="data[0].autor == user.id">
            <a x-bind:href="'/posts/' + data[0].id + '/edit'" class="xs:py-1 lg:py-2 xs:px-2 lg:px-4 border-2 border-black-24 rounded xs:text-xs lg:text-base">Editar</a>
            <p class="xs:py-1 lg:py-2 xs:px-2 lg:px-4 border-2 border-red-500 rounded bg-red-200 text-red-500 font-bold cursor-pointer xs:text-xs lg:text-base" x-on:click="showModal = true">Excluir</p>
        </div>
    </section>

</section>
@endsection
@section('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('show', () => ({
                data: {!! json_encode($post) !!},
                user: {!! json_encode($user) !!},
                api: axios.create(),
                showModal: false,

                sliceTexto(item) {
                    if(item.length > 60) return item.slice(0, 60) + '...';
                    else return item;
                },

                avaliado(decisao) {
                    this.api.post('{{route('api.posts.avaliado', false)}}', {
                        id: this.data[0].id,
                        estado: decisao,
                    }).then(response => {
                        window.location.href = "/";
                    })
                },

                deletado() {
                    this.api.post('{{route('api.posts.deletado', false)}}', {
                        id: this.data[0].id,
                    }).then(response => {
                        window.location.href = "/";
                    })
                },

                destroy() {
                    this.api.post('/posts/destroy', {
                        Id: this.data[0].id,
                    }).then(response => {
                        console.log(response);
                    })
                },

                getDate(date) {
                    let dt = date.slice(0, 10);
                    let year = dt.slice(0, 4);
                    let month = dt.slice(5, 7);
                    let day = dt.slice(8, 10);
                    return day + '/' + month + '/' + year;
                }
            }))
        })
    </script>
@endsection
