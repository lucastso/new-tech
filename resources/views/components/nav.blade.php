@if($log == false)
<section class="h-20 flex sm:flex-col-reverse lg:flex-row justify-between items-center border-b border-gray-100">
    <div class="flex justify-center items-center gap-12 xs:ml-6 lg:ml-32">
        <img src="/logo.svg" alt="logo">
        <form action="#" class="relative">
            <input type="text" class="bg-white border border-gray-400 rounded-md w-96 h-10 focus:ring-0 outline-none outline-0 pl-2 pr-10">
            <img src="/lupa.png" alt="search" class="absolute top-3 right-3">
        </form>
    </div>
    <div class="flex justify-center items-center gap-12 xs:mr-6 lg:mr-32 font-bold text-black-24">
        <a href="/register">Registrar-se</a>
        <a href="/login" class="py-2 px-4 border-2 border-black-24 rounded">Login</a>
    </div>
</section>
@else
    <section class="h-20 flex sm:flex-col-reverse lg:flex-row justify-between items-center border-b border-gray-100" x-data="nav">
        <div class="flex justify-center items-center gap-12 xs:ml-6 lg:ml-32">
            <img src="/logo.svg" alt="logo">
            <form action="#" class="relative">
                <input type="text" class="bg-white border border-gray-400 rounded-md w-96 h-10 focus:ring-0 outline-none outline-0 pl-2 pr-10">
                <img src="/lupa.png" alt="search" class="absolute top-3 right-3">
            </form>
        </div>
        @if($user->level == 0)
        <div class="flex justify-center items-center gap-12 xs:mr-6 lg:mr-32 font-bold text-black-24">
            <a href="/">Meus posts</a>
            <a href="/posts/novo" class="py-2 px-4 border-2 border-black-24 rounded">Novo post +</a>
            <a x-on:click="showLogOut = !showLogOut " class="flex gap-4 items-center text-black-24 relative">
                <p>{{$user->name}}</p>
                <img src="{{$user->profile_photo_url}}" alt="" class="rounded-full h-10 w-10">
                <form method="POST" action="{{ route('logout') }}" class="border rounded border-black-24 absolute mt-24 px-4 py-2 bg-white right-24" x-show="showLogOut == true">
                    @csrf
                    <div class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                            this.closest('form').submit(); " role="button">
                            {{ __('Log Out') }}
                        </a>
                    </div>
                </form>
            </a>
        </div>
        @elseif($user->level == 1)
        <div class="flex justify-center items-center gap-12 xs:mr-6 lg:mr-32 font-bold text-black-24">
            <a href="/" class="py-2 px-4 border-2 border-black-24 rounded">Avaliar posts</a>
        </div>
        @else
        <div class="flex justify-center items-center gap-12 xs:mr-6 lg:mr-32 font-bold text-black-24">
            <a href="/">Usuários</a>
            <a href="/">Posts</a>
        </div>
        @endif
    </section>
@endif

<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('nav', () => ({
            showLogOut: false,
        }))
    })
</script>