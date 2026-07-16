<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="shrink-0">
                    <a href="/"><img src="/img/blud.jpg" alt="Your Company" class="size-8" /></a>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        @auth
                            <x-nav-link href="{{ route('admin.dashboard') }}" :active="request()->is('admin/*') && !request()->is('admin/posts*')">Dashboard</x-nav-link>
                            <x-nav-link href="{{ route('admin.posts') }}" :active="request()->is('admin/posts*')">Artikel</x-nav-link>
                            <x-nav-link href="/booking/tracking" :active="request()->is('booking/tracking')">Cek Booking</x-nav-link>
                        @else
                            <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                            <x-nav-link href="/posts" :active="request()->is('posts')">Artikel</x-nav-link>
                            <x-nav-link href="/booking" :active="request()->is('booking')">Booking</x-nav-link>
                            <x-nav-link href="/booking/tracking" :active="request()->is('booking/tracking')">Cek Booking</x-nav-link>
                        @endauth
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    @auth
                        <div class="relative ml-3">
                            <button
                                onclick="var m=document.getElementById('profile-menu');m.classList.toggle('hidden');event.stopPropagation()"
                                class="relative flex max-w-xs items-center rounded-full focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                                <span class="absolute -inset-1.5"></span>
                                <img src="/img/boy.png" alt=""
                                    class="size-8 rounded-full outline -outline-offset-1 outline-white/10" />
                            </button>
                            <div id="profile-menu" onclick="event.stopPropagation()"
                                class="hidden absolute right-0 z-10 mt-2 w-36 origin-top-right rounded-md bg-white py-1 shadow-lg outline-1 outline-black/5">
                                <form action="{{ route('admin.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
                                </form>
                            </div>
                        </div>
                        <script>
                            document.addEventListener('click', function(e) {
                                var m = document.getElementById('profile-menu');
                                if (!m) return;
                                var btn = m.parentElement.querySelector('button');
                                if (!btn.contains(e.target) && !m.contains(e.target)) {
                                    m.classList.add('hidden');
                                }
                            });
                        </script>
                    @else
                        <a href="{{ route('admin.login') }}"
                            class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                            Login Admin
                        </a>
                    @endauth
                </div>
            </div>
            <div class="-mr-2 flex md:hidden">
                <button type="button" id="mobile-menu-btn"
                    class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500"
                    onclick="document.getElementById('mobile-menu').classList.toggle('hidden'); document.getElementById('mobile-menu-btn')?.classList.toggle('active')">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon"
                        aria-hidden="true" class="size-6">
                        <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon"
                        aria-hidden="true" class="size-6" style="display:none">
                        <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <style>
                    #mobile-menu-btn.active svg:first-child {
                        display: none;
                    }

                    #mobile-menu-btn.active svg:last-child {
                        display: block !important;
                    }
                </style>
            </div>
        </div>
    </div>

    <div id="mobile-menu" class="hidden">
        <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
            @auth
                <x-nav-link href="{{ route('admin.dashboard') }}" :active="request()->is('admin/*') && !request()->is('admin/posts*')">Dashboard</x-nav-link>
                <x-nav-link href="{{ route('admin.posts') }}" :active="request()->is('admin/posts*')">Artikel</x-nav-link>
                <x-nav-link href="/booking/tracking" :active="request()->is('booking/tracking')">Cek Booking</x-nav-link>
            @else
                <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                <x-nav-link href="/posts" :active="request()->is('posts')">Artikel</x-nav-link>
                <x-nav-link href="/booking" :active="request()->is('booking')">Booking</x-nav-link>
                <x-nav-link href="/booking/tracking" :active="request()->is('booking/tracking')">Cek Booking</x-nav-link>
            @endauth
        </div>
        <div class="border-t border-white/10 pt-4 pb-3">
            <div class="flex items-center px-5">
                <div class="shrink-0">
                    <img src="/img/boy.png" alt=""
                        class="size-10 rounded-full outline -outline-offset-1 outline-white/10" />
                </div>
                <div class="ml-3">
                    <div class="text-base/5 font-medium text-white">BLUD</div>
                    <div class="text-sm font-medium text-gray-400">BLUD UPTD PIP2B dan Jakon</div>
                </div>
            </div>
            <div class="mt-3 space-y-1 px-2">
                @auth
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="block w-full text-left rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white">Logout</button>
                    </form>
                @else
                    <a href="{{ route('admin.login') }}"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white">Login
                        Admin</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
