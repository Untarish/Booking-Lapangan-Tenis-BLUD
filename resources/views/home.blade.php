<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="space-y-10">

        {{-- Hero Section --}}
        <div class="relative rounded-3xl overflow-hidden shadow-2xl min-h-[400px] flex items-center"
            style="background-image: url('/img/L4.jpg'); background-size: cover; background-position: center;">
            <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-black/30"></div>
            <div class="absolute -top-10 -right-10 w-72 h-72 bg-white/10 rounded-full animate-ping-slow"
                style="animation-delay: 0s;"></div>
            <div class="absolute -bottom-10 -left-10 w-56 h-56 bg-white/10 rounded-full animate-ping-slow"
                style="animation-delay: 1s;"></div>
            <div class="absolute top-1/3 left-1/4 w-4 h-4 bg-white/30 rounded-full animate-float"></div>
            <div class="absolute top-1/2 right-1/3 w-3 h-3 bg-white/20 rounded-full animate-float"
                style="animation-delay: 0.5s;"></div>
            <div class="absolute bottom-1/4 right-1/4 w-5 h-5 bg-white/25 rounded-full animate-float"
                style="animation-delay: 1s;"></div>
            <div class="absolute top-1/4 right-1/5 w-6 h-6 bg-white/15 rounded-full animate-float"
                style="animation-delay: 1.5s;"></div>

            <div class="relative z-10 px-8 py-12 md:py-16 md:px-12 text-white">
                <div class="max-w-2xl">
                    <span
                        class="inline-block bg-white/20 backdrop-blur-sm text-white text-sm font-semibold px-4 py-1.5 rounded-full mb-4 animate-fade-in-down">
                        BLUD UPTD PIP2B DAN JASA KONSTRUKSI DISPERKIM
                    </span>
                    <h1 class="text-4xl md:text-5xl font-bold mb-4 leading-tight animate-fade-in-up">
                        Booking Lapangan <span class="text-yellow-300 inline-block animate-bounce-subtle">Tenis</span>
                    </h1>
                    <p class="text-lg text-white/80 mb-6 animate-fade-in-up" style="animation-delay: 0.2s;">
                        Nikmati kemudahan booking lapangan tenis secara online. Harga terjangkau, lapangan berkualitas,
                        dan pelayanan terbaik.
                    </p>
                    <div class="flex flex-wrap gap-3 animate-fade-in-up" style="animation-delay: 0.4s;">
                        <a href="/booking"
                            class="inline-flex items-center gap-2 bg-white text-indigo-700 font-semibold px-6 py-3 rounded-xl hover:bg-indigo-50 transition-all shadow-lg hover:shadow-xl hover:scale-105 active:scale-95">
                            Booking Sekarang
                            <svg class="w-5 h-5 animate-bounce-x" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                        <a href="/posts"
                            class="inline-flex items-center gap-2 bg-white/15 backdrop-blur-sm text-white font-medium px-6 py-3 rounded-xl hover:bg-white/25 transition-all border border-white/20 hover:scale-105 active:scale-95">
                            Baca Artikel
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Stats Counter --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 stagger-children">
            <div
                class="stat-card bg-white rounded-xl shadow-md p-5 text-center hover:shadow-xl transition-all duration-300 hover:-translate-y-2 cursor-default">
                <div
                    class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>
                </div>
                <p class="text-2xl font-bold text-gray-800 counter-value" data-target="2">0</p>
                <p class="text-sm text-gray-500">Lapangan</p>
            </div>
            <div
                class="stat-card bg-white rounded-xl shadow-md p-5 text-center hover:shadow-xl transition-all duration-300 hover:-translate-y-2 cursor-default">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <p class="text-2xl font-bold text-gray-800">08:00 - 22:00</p>
                <p class="text-sm text-gray-500">Jam Operasional</p>
            </div>
            <div
                class="stat-card bg-white rounded-xl shadow-md p-5 text-center hover:shadow-xl transition-all duration-300 hover:-translate-y-2 cursor-default">
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <p class="text-2xl font-bold text-gray-800 counter-value" data-target="70">0</p>
                <p class="text-sm text-gray-500">Mulai / Jam (K)</p>
            </div>
            <div
                class="stat-card bg-white rounded-xl shadow-md p-5 text-center hover:shadow-xl transition-all duration-300 hover:-translate-y-2 cursor-default">
                <div
                    class="w-12 h-12 bg-pink-100 rounded-lg flex items-center justify-center mx-auto mb-3 animate-pulse-glow">
                    <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <p class="text-2xl font-bold text-pink-600 animate-pulse-glow-text">Diskon 20%</p>
                <p class="text-sm text-gray-500">Slot Pagi</p>
            </div>
        </div>

        {{-- Lapangan Cards --}}
        <div class="scroll-reveal">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                <span class="w-1 h-6 bg-indigo-600 rounded-full inline-block animate-pulse-indigo"></span>
                Lapangan Kami
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 stagger-children">
                <div
                    class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 perspective-1000">
                    <div class="relative h-56 overflow-hidden">
                        <img src="/img/L1.jpg" alt="Lapangan 1"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
                        <div
                            class="absolute inset-0 bg-indigo-600/0 group-hover:bg-indigo-600/20 transition-colors duration-500">
                        </div>
                        <h3 class="absolute bottom-4 left-4 text-xl font-bold text-white drop-shadow-lg">Lapangan 1</h3>
                        <div
                            class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm text-indigo-700 text-xs font-bold px-3 py-1 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-500 translate-y-2 group-hover:translate-y-0">
                            Populer
                        </div>
                    </div>
                    <div class="p-5">
                        <p class="text-gray-600 text-sm">Lapangan utama dengan kualitas terbaik, cocok untuk
                            pertandingan dan latihan</p>
                        <div class="mt-4 flex items-center justify-between">
                            <span class="text-sm text-gray-500">Mulai dari</span>
                            <span
                                class="text-lg font-bold text-indigo-600 group-hover:scale-110 inline-block transition-transform">Rp
                                70.000 / jam</span>
                        </div>
                    </div>
                </div>
                <div
                    class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 perspective-1000">
                    <div class="relative h-56 overflow-hidden">
                        <img src="/img/L4.jpg" alt="Lapangan 2"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
                        <div
                            class="absolute inset-0 bg-indigo-600/0 group-hover:bg-indigo-600/20 transition-colors duration-500">
                        </div>
                        <h3 class="absolute bottom-4 left-4 text-xl font-bold text-white drop-shadow-lg">Lapangan 2
                        </h3>
                        <div
                            class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm text-indigo-700 text-xs font-bold px-3 py-1 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-500 translate-y-2 group-hover:translate-y-0">
                            Favorite
                        </div>
                    </div>
                    <div class="p-5">
                        <p class="text-gray-600 text-sm">Lapangan dengan pencahayaan optimal, nyaman untuk bermain di
                            malam hari</p>
                        <div class="mt-4 flex items-center justify-between">
                            <span class="text-sm text-gray-500">Mulai dari</span>
                            <span
                                class="text-lg font-bold text-indigo-600 group-hover:scale-110 inline-block transition-transform">Rp
                                70.000 / jam</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Info Cards with animation --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 stagger-children">
            <div
                class="info-card bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl shadow-lg p-6 border border-blue-100 hover:shadow-xl transition-all duration-500 hover:-translate-y-1">
                <div class="flex items-start gap-4">
                    <div
                        class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center shrink-0 animate-float-icon">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-semibold text-gray-800 mb-3">Jadwal Operasional</h3>
                        <div class="space-y-2">
                            <div class="flex items-center justify-between bg-white/60 rounded-lg px-3 py-2">
                                <span class="text-sm text-gray-600">Senin - Jumat</span>
                                <span class="text-sm font-semibold text-indigo-700">08:00 - 22:00 WIB</span>
                            </div>
                            <div class="flex items-center justify-between bg-white/60 rounded-lg px-3 py-2">
                                <span class="text-sm text-gray-600">Sabtu - Minggu</span>
                                <span class="text-sm font-semibold text-indigo-700">07:00 - 23:00 WIB</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="info-card bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl shadow-lg p-6 border border-green-100 hover:shadow-xl transition-all duration-500 hover:-translate-y-1">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center shrink-0 animate-float-icon"
                        style="animation-delay: 0.3s;">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-semibold text-gray-800 mb-3">Tarif Sewa</h3>
                        <div class="space-y-2">
                            <div class="flex items-center justify-between bg-white/60 rounded-lg px-3 py-2">
                                <span class="text-sm text-gray-600">Weekday</span>
                                <span class="text-sm font-semibold text-green-700">Rp 70.000 / jam</span>
                            </div>
                            <div class="flex items-center justify-between bg-white/60 rounded-lg px-3 py-2">
                                <span class="text-sm text-gray-600">Weekend</span>
                                <span class="text-sm font-semibold text-green-700">Rp 100.000 / jam</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="info-card bg-gradient-to-br from-pink-50 to-rose-50 rounded-2xl shadow-lg p-6 border border-pink-100 hover:shadow-xl transition-all duration-500 hover:-translate-y-1">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-pink-100 rounded-xl flex items-center justify-center shrink-0 animate-float-icon"
                        style="animation-delay: 0.6s;">
                        <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a12 12 0 0118 0M21 5v14M3 19V5m0 14a12 12 0 0118 0" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-semibold text-gray-800 mb-3">Kontak Kami</h3>
                        <div class="space-y-2">
                            <div class="flex items-center gap-2 bg-white/60 rounded-lg px-3 py-2">
                                <span class="text-sm">📞</span>
                                <span class="text-sm font-medium text-gray-700">0812-7314-3692</span>
                            </div>
                            <a href="https://wa.me/6281273143692"
                                class="flex items-center gap-2 bg-white/60 rounded-lg px-3 py-2 hover:bg-green-100 transition-colors group">
                                <span class="text-sm">💬</span>
                                <span class="text-sm font-medium text-green-600 group-hover:text-green-700">Chat
                                    WhatsApp</span>
                                <svg class="w-3 h-3 text-green-500 ml-auto group-hover:translate-x-1 transition-transform"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="info-card bg-gradient-to-br from-yellow-50 to-orange-50 rounded-2xl shadow-lg p-6 border border-yellow-100 hover:shadow-xl transition-all duration-500 hover:-translate-y-1 relative overflow-hidden">
                <div
                    class="absolute -top-8 -right-8 w-32 h-32 bg-gradient-to-bl from-yellow-200/60 to-transparent rounded-full animate-rotate-slow">
                </div>
                <div class="absolute -bottom-8 -left-8 w-24 h-24 bg-gradient-to-tr from-orange-200/40 to-transparent rounded-full animate-rotate-slow"
                    style="animation-direction: reverse;"></div>
                <div class="flex items-start gap-4 relative z-10">
                    <div
                        class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center shrink-0 animate-wiggle">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-semibold text-gray-800 mb-2">Promo Spesial</h3>
                        <p class="text-sm text-gray-600">Booking slot pagi (sebelum jam 12:00) dan dapatkan diskon
                            spesial!</p>
                        <div
                            class="mt-3 inline-block bg-gradient-to-r from-pink-500 to-rose-500 text-white text-sm font-bold px-4 py-1.5 rounded-full animate-shimmer">
                            Diskon 20%
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Video --}}
        <div class="scroll-reveal">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                <span class="w-1 h-6 bg-indigo-600 rounded-full inline-block animate-pulse-indigo"></span>
                Video Profile
            </h2>
            <div class="rounded-2xl shadow-xl overflow-hidden group">
                <div class="relative">
                    <iframe class="w-full h-64 md:h-96"
                        src="https://www.youtube.com/embed/KUTRzkaRlPA?si=eO6bG2rGf15Ot47N"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                    <div
                        class="absolute inset-0 bg-indigo-600/0 group-hover:bg-indigo-600/10 transition-colors duration-500 pointer-events-none">
                    </div>
                </div>
            </div>
        </div>

        {{-- Artikel Terbaru --}}
        @if ($posts->count() > 0)
            <div class="scroll-reveal">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
                        <span class="w-1 h-6 bg-indigo-600 rounded-full inline-block animate-pulse-indigo"></span>
                        Artikel Terbaru
                    </h2>
                    <a href="/posts"
                        class="text-sm text-indigo-600 hover:underline font-medium inline-flex items-center gap-1 group">
                        Lihat Semua
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 stagger-children">
                    @foreach ($posts as $post)
                        <article
                            class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-500 hover:-translate-y-2 group">
                            <div
                                class="h-40 overflow-hidden relative @if (!$post->image) bg-gradient-to-br from-indigo-400 via-purple-500 to-pink-500 flex items-center justify-center @endif">
                                @if ($post->image)
                                    <img src="{{ asset($post->image) }}" alt="{{ $post->title }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                                @else
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                                    <svg class="w-12 h-12 text-white/30 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                    </svg>
                                @endif
                            </div>
                            <div class="p-4">
                                <p class="text-xs text-gray-400 mb-1 flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ $post->created_at->format('d M Y') }}
                                </p>
                                <a href="/posts/{{ $post->slug }}" class="hover:underline">
                                    <h3
                                        class="font-semibold text-gray-800 line-clamp-2 group-hover:text-indigo-600 transition-colors">
                                        {{ $post->title }}</h3>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- CTA --}}
        <div class="scroll-reveal">
            <div class="relative rounded-2xl shadow-xl p-8 md:p-12 text-center text-white overflow-hidden"
                style="background-image: url('/img/L2.jpg'); background-size: cover; background-position: center;">
                <div class="absolute inset-0 bg-gradient-to-r from-indigo-900/80 via-purple-900/70 to-pink-900/80">
                </div>
                <div class="absolute -top-6 -right-6 w-40 h-40 bg-white/5 rounded-full animate-ping-slow"
                    style="animation-delay: 0.5s;"></div>
                <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-white/5 rounded-full animate-ping-slow"
                    style="animation-delay: 1s;"></div>
                <div class="relative z-10">
                    <h2 class="text-3xl font-bold mb-3 animate-fade-in-up">Siap Bermain Tenis?</h2>
                    <p class="text-white/80 mb-6 max-w-lg mx-auto animate-fade-in-up" style="animation-delay: 0.2s;">
                        Booking lapangan sekarang dan nikmati pengalaman bermain tenis yang menyenangkan bersama kami.
                    </p>
                    <a href="/booking"
                        class="inline-flex items-center gap-2 bg-white text-indigo-700 font-semibold px-8 py-3.5 rounded-xl hover:bg-indigo-50 transition-all shadow-lg hover:shadow-xl hover:scale-105 active:scale-95 animate-fade-in-up"
                        style="animation-delay: 0.4s;">
                        Booking Sekarang
                        <svg class="w-5 h-5 animate-bounce-x" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

</x-layout>

<style>
    @keyframes ping-slow {

        0%,
        100% {
            transform: scale(1);
            opacity: 0.15;
        }

        50% {
            transform: scale(1.3);
            opacity: 0.05;
        }
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px) scale(1);
        }

        50% {
            transform: translateY(-15px) scale(1.1);
        }
    }

    @keyframes bounce-subtle {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-6px);
        }
    }

    @keyframes bounce-x {

        0%,
        100% {
            transform: translateX(0);
        }

        50% {
            transform: translateX(5px);
        }
    }

    @keyframes pulse-glow {

        0%,
        100% {
            box-shadow: 0 0 0 0 rgba(236, 72, 153, 0.3);
        }

        50% {
            box-shadow: 0 0 0 12px rgba(236, 72, 153, 0);
        }
    }

    @keyframes pulse-glow-text {

        0%,
        100% {
            text-shadow: 0 0 4px rgba(236, 72, 153, 0.3);
        }

        50% {
            text-shadow: 0 0 12px rgba(236, 72, 153, 0.5);
        }
    }

    @keyframes fade-in-up {
        from {
            opacity: 0;
            transform: translateY(24px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fade-in-down {
        from {
            opacity: 0;
            transform: translateY(-16px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes float-icon {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-5px);
        }
    }

    @keyframes wiggle {

        0%,
        100% {
            transform: rotate(0deg);
        }

        25% {
            transform: rotate(-5deg);
        }

        75% {
            transform: rotate(5deg);
        }
    }

    @keyframes rotate-slow {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    @keyframes shimmer {
        0% {
            background-position: -200% center;
        }

        100% {
            background-position: 200% center;
        }
    }

    @keyframes pulse-indigo {

        0%,
        100% {
            opacity: 1;
            transform: scaleY(1);
        }

        50% {
            opacity: 0.7;
            transform: scaleY(1.3);
        }
    }

    .animate-ping-slow {
        animation: ping-slow 3s cubic-bezier(0, 0, 0.2, 1) infinite;
    }

    .animate-float {
        animation: float 4s ease-in-out infinite;
    }

    .animate-bounce-subtle {
        animation: bounce-subtle 2s ease-in-out infinite;
    }

    .animate-bounce-x {
        animation: bounce-x 1.5s ease-in-out infinite;
    }

    .animate-pulse-glow {
        animation: pulse-glow 2s ease-in-out infinite;
    }

    .animate-pulse-glow-text {
        animation: pulse-glow-text 2s ease-in-out infinite;
    }

    .animate-fade-in-up {
        animation: fade-in-up 0.8s ease-out both;
    }

    .animate-fade-in-down {
        animation: fade-in-down 0.6s ease-out both;
    }

    .animate-float-icon {
        animation: float-icon 3s ease-in-out infinite;
    }

    .animate-wiggle {
        animation: wiggle 2s ease-in-out infinite;
    }

    .animate-rotate-slow {
        animation: rotate-slow 20s linear infinite;
    }

    .animate-shimmer {
        background-size: 200% 100%;
        animation: shimmer 3s linear infinite;
    }

    .animate-pulse-indigo {
        animation: pulse-indigo 2s ease-in-out infinite;
    }

    .stagger-children>* {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .stagger-children>*.visible {
        opacity: 1;
        transform: translateY(0);
    }

    .stagger-children>*:nth-child(1) {
        transition-delay: 0s;
    }

    .stagger-children>*:nth-child(2) {
        transition-delay: 0.1s;
    }

    .stagger-children>*:nth-child(3) {
        transition-delay: 0.2s;
    }

    .stagger-children>*:nth-child(4) {
        transition-delay: 0.3s;
    }

    .scroll-reveal {
        opacity: 0;
        transform: translateY(40px);
        transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .scroll-reveal.visible {
        opacity: 1;
        transform: translateY(0);
    }

    .stat-card {
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .stat-card:hover {
        transform: translateY(-8px) scale(1.02);
    }

    .stat-card:hover .w-12 {
        transform: scale(1.1) rotate(5deg);
        transition: transform 0.3s ease;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        // Counter animation with easing
        const counters = document.querySelectorAll('.counter-value');
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    const target = parseInt(el.dataset.target);
                    let current = 0;
                    const duration = 1500;
                    const startTime = performance.now();

                    function updateCounter(currentTime) {
                        const elapsed = currentTime - startTime;
                        const progress = Math.min(elapsed / duration, 1);
                        const easeOut = 1 - Math.pow(1 - progress, 3);
                        current = Math.round(easeOut * target);
                        el.textContent = current + (target === 70 ? 'K' : '');
                        if (progress < 1) {
                            requestAnimationFrame(updateCounter);
                        } else {
                            el.textContent = target + (target === 70 ? 'K' : '');
                        }
                    }
                    requestAnimationFrame(updateCounter);
                    counterObserver.unobserve(el);
                }
            });
        }, {
            threshold: 0.5
        });
        counters.forEach(c => counterObserver.observe(c));

        // Stagger children scroll animation
        const staggerContainers = document.querySelectorAll('.stagger-children');
        const staggerObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const children = entry.target.children;
                    Array.from(children).forEach((child, i) => {
                        setTimeout(() => {
                            child.classList.add('visible');
                        }, i * 120);
                    });
                    staggerObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.15
        });
        staggerContainers.forEach(c => staggerObserver.observe(c));

        // Scroll reveal sections
        const revealSections = document.querySelectorAll('.scroll-reveal');
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.15
        });
        revealSections.forEach(s => revealObserver.observe(s));

        // 3D tilt effect on cards
        document.querySelectorAll('.info-card, .group.bg-white.rounded-2xl').forEach(card => {
            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                const rotateX = (y - centerY) / 20;
                const rotateY = (centerX - x) / 20;
                card.style.transform =
                    `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-4px)`;
            });
            card.addEventListener('mouseleave', () => {
                card.style.transform = '';
            });
        });
    });
</script>
