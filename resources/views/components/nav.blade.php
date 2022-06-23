<div x-data="nav()">
    @if($log == false)
        <section class="xs:h-auto lg:h-20 flex justify-between items-center border-b border-gray-100 pb-4 lg:pb-0">
            <div class="xs:mt-4 lg:mt-0 flex justify-center items-center xs:gap-4 lg:gap-12 xs:ml-6 lg:ml-32">
                <a href="/">
                    <img src="/logo.svg" alt="logo">
                </a>
                <p id="texto"></p>
            </div>
            <div class="flex justify-center items-center gap-12 xs:mr-6 lg:mr-32 font-bold text-black-24">
                <a href="/register">Registrar-se</a>
                <a href="/login" class="py-2 px-4 border-2 border-black-24 rounded">Login</a>
            </div>
        </section>
    @else
        <section class="xs:h-auto lg:h-20 flex xs:flex-col lg:flex-row justify-between items-center border-b border-gray-100 pb-4 lg:pb-0">
            <div class="xs:mt-4 lg:mt-0 flex justify-center items-center xs:gap-4 lg:gap-12 xs:ml-6 lg:ml-32">
                <a href="/">
                    <img src="/logo.svg" alt="logo">
                </a>
                @if($_SERVER['REQUEST_URI'] == '/dashboard' || $_SERVER['REQUEST_URI'] == '/')
                <form class="relative">
                    <input type="text" class="bg-white border border-gray-400 rounded-md xs:w-full lg:w-96 h-10 focus:ring-0 outline-none outline-0 pl-2 pr-10" id="texto">
                    <img src="/lupa.png" alt="search" class="absolute top-3 right-3">
                </form>
                @else
                <p id="texto"></p>
                @endif
            </div>
            @if($user->level == 0)
            <div class="xs:mt-4 lg:mt-0 flex justify-center items-center xs:gap-4 lg:gap-12 xs:mr-6 lg:mr-32 font-bold text-black-24 xs:flex-col lg:flex-row">
                <a href="/posts/myposts" class="xs:text-xs lg:text-base">Meus posts</a>
                <a href="/posts/novo" class="xs:py-1 lg:py-2 xs:px-2 lg:px-4 border-2 border-black-24 rounded xs:text-xs lg:text-base">Novo post +</a>
                <a x-on:click="showLogOut = !showLogOut " class="flex gap-4 items-center text-black-24 relative">
                    <p class="xs:text-xs lg:text-base">{{$user->name}}</p>
                    @if($user->profile_photo_path != null)
                        <img src="{{$user->profile_photo_path}}" alt="" class="rounded-full h-10 w-10 object-cover">
                    @else
                        <img src="/user.png" alt="" class="rounded-full h-10 w-10 object-cover">
                    @endif
                    <form method="POST" action="{{ route('logout') }}" class="border rounded border-black-24 absolute mt-24 px-4 py-2 bg-white right-24" x-show="showLogOut == true">
                        @csrf
                        <div class="flex flex-col gap-2">
                            <a href="/perfil/{{$user->id}}/edit">
                                {{ __('Editar Perfil') }}
                            </a>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                this.closest('form').submit(); " role="button">
                                {{ __('Log Out') }}
                            </a>
                        </div>
                    </form>
                </a>
            </div>
            @elseif($user->level == 1)
            <div class="xs:mt-4 lg:mt-0 flex justify-center items-center gap-12 xs:mr-6 lg:mr-32 font-bold text-black-24">
                <a href="/avaliador/avaliar" class="xs:py-1 lg:py-2 xs:px-2 lg:px-4 border-2 border-black-24 rounded xs:text-xs lg:text-base">Avaliar posts</a>
                <a x-on:click="showLogOut = !showLogOut " class="flex gap-4 items-center text-black-24 relative">
                <p class="xs:text-xs lg:text-base">{{$user->name}}</p>
                @if($user->profile_photo_path != null)
                    <img src="{{$user->profile_photo_path}}" alt="" class="rounded-full h-10 w-10 object-cover">
                @else
                    <img src="/user.png" alt="" class="rounded-full h-10 w-10 object-cover">
                @endif
                <form method="POST" action="{{ route('logout') }}" class="border rounded border-black-24 absolute mt-24 px-4 py-2 bg-white right-24" x-show="showLogOut == true">
                    @csrf
                    <div class="flex flex-col gap-2">
                        <a href="/perfil/{{$user->id}}/edit">
                            {{ __('Editar Perfil') }}
                        </a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            this.closest('form').submit(); " role="button">
                            {{ __('Log Out') }}
                        </a>
                    </div>
                </form>
            </a>
            </div>
            @else
            <p></p>
            @endif
        </section>
    @endif
</div>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('nav', () => ({
            showLogOut: false,
        }))
    })
</script>