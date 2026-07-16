<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="space-y-8">

        <div class="relative rounded-2xl overflow-hidden shadow-xl group"
            style="background-image: url('/img/L1.jpg'); background-size: cover; background-position: center;">
            <div class="absolute inset-0 bg-gradient-to-r from-indigo-900/80 via-purple-900/70 to-pink-900/80"></div>
            <div class="relative z-10 p-6 md:p-10 text-center text-white">
                <h2 class="text-2xl md:text-3xl font-bold mb-4">Video Profile BLUD UPTD PIP2B</h2>
                <p class="text-white/70 mb-6 max-w-lg mx-auto">Tonton video profile kami untuk mengetahui lebih lanjut
                    tentang layanan dan fasilitas</p>
                <div class="rounded-xl overflow-hidden shadow-2xl max-w-3xl mx-auto">
                    <iframe class="w-full aspect-video"
                        src="https://www.youtube.com/embed/KUTRzkaRlPA?si=eO6bG2rGf15Ot47N" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>

        @if ($posts->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($posts as $post)
                    <article
                        class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1 group">
                        <div class="relative h-48 bg-gradient-to-br from-indigo-400 to-purple-600 overflow-hidden">
                            @if ($post->image)
                                <img src="{{ asset($post->image) }}" alt="{{ $post->title }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <svg class="w-16 h-16 text-white/40" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                    </svg>
                                </div>
                            @endif
                            @if ($post->is_featured)
                                <span
                                    class="absolute top-3 right-3 bg-yellow-400 text-yellow-900 text-xs font-bold px-2.5 py-1 rounded-full shadow-md">
                                    Featured
                                </span>
                            @endif
                        </div>
                        <div class="p-5">
                            <div class="flex items-center gap-2 text-xs text-gray-400 mb-2">
                                <span>{{ $post->author }}</span>
                                <span>&bull;</span>
                                <span>{{ $post->created_at->format('d M Y') }}</span>
                            </div>
                            <a href="/posts/{{ $post->slug }}" class="hover:underline">
                                <h2 class="text-lg font-bold text-gray-800 mb-2 line-clamp-2">{{ $post->title }}</h2>
                            </a>
                            <p class="text-sm text-gray-500 mb-4 line-clamp-3">
                                {{ $post->excerpt ?? Str::limit($post->body, 120) }}</p>
                            <a href="/posts/{{ $post->slug }}"
                                class="inline-flex items-center gap-1 text-sm font-medium text-indigo-600 hover:text-indigo-800 transition-colors">
                                Baca Selengkapnya
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $posts->links() }}
            </div>
        @else
            <div class="text-center py-16">
                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                </svg>
                <h3 class="text-lg font-medium text-gray-500">Belum ada artikel</h3>
            </div>
        @endif
    </div>
</x-layout>
