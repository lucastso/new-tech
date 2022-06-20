@extends('layouts.interna')
@section('content')
<section x-data="show()">
    <section class="fixed inset-0 bg-black bg-opacity-50 overflow-y-auto h-full w-full" x-show="showModal == true">
        <div class="relative top-1/2 mx-auto p-6 w-1/3 rounded bg-white" x-show="showModal == true">
            <div class="flex justify-between items-center">
                <p>Tem certeza que você deseja excluir o post?</p> 
                <p class="font-bold cursor-pointer" x-on:click="showModal = false">X</p>
            </div>
            <div class="flex justify-end w-full items-center gap-4 mt-10" x-show="data[0].autor == user.id">
                <a x-on:click="destroy()" class="py-2 px-4 border-2 border-red-500 rounded bg-red-200 text-red-500 font-bold cursor-pointer">Excluir</a>
            </div>
        </div>
    </section>

    <section>
        <div class="flex justify-between w-full items-center">
            <div class="flex gap-1 items-center">
                <h1 x-text="data[0].titulo" class="font-bold text-lg"></h1>
                <span class="text-sm text-gray-600">-</span>
                <p x-text="getDate(data[0].created_at)" class="text-sm text-gray-600"></p>
            </div>
            <div class="flex items-center font-bold gap-4">
                <p x-text="data[0].name"></p>
                <img x-bind:src="data[0].profile_photo_path" alt="user image" class="rounded-full h-10 w-10">
            </div>
        </div>
        <img x-bind:src="data[0].imagem" alt="post image" class="w-full h-80 object-cover mt-6 rounded">
        <p x-text="data[0].conteudo" class="mt-6"></p>

        <div class="flex justify-between w-full items-center gap-4 mt-10" x-show="data[0].autor == user.id">
            <a href="/" class="py-2 px-4 border-2 border-black-24 rounded">Editar</a>
            <p class="py-2 px-4 border-2 border-red-500 rounded bg-red-200 text-red-500 font-bold cursor-pointer" x-on:click="showModal = true">Excluir</p>
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
    
                init() {
                    this.getText();
                },

                sliceTexto(item) {
                    return item.slice(0, 60) + '...';
                },

                destroy() {
                    this.api.post('/posts/destroy', {
                        Id: this.data[0].id,
                    }).then(response => {
                        console.log(response);
                    })
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
