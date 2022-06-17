@extends('layouts.interna')
@section('content')
<section x-data="show()">

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
    </section>

</section>
@endsection
@section('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('show', () => ({
                data: {!! json_encode($post) !!},
                api: axios.create(),
    
                init() {
                    this.getText();
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
