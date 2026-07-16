<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-xl shadow-md p-6 md:p-8">
            <h3 class="text-lg font-semibold text-gray-800 mb-6">{{ $post ? 'Edit Artikel' : 'Tambah Artikel' }}</h3>

            <form action="{{ $post ? route('admin.posts.update', $post->id) : route('admin.posts.store') }}"
                method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf
                @if ($post)
                    @method('PUT')
                @endif

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Judul <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title', $post->title ?? '') }}" required
                        class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Penulis <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="author" value="{{ old('author', $post->author ?? '') }}" required
                        class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Ringkasan (excerpt)</label>
                    <textarea name="excerpt" rows="2"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Konten <span
                            class="text-red-500">*</span></label>
                    <textarea name="body" rows="10" required
                        class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500 font-mono text-sm">{{ old('body', $post->body ?? '') }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Gambar</label>
                    @if ($post && $post->image)
                        <div class="mb-2">
                            <img src="{{ asset($post->image) }}" alt="" class="w-40 h-24 object-cover rounded">
                        </div>
                    @endif
                    <input type="file" name="image" accept="image/*"
                        class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                </div>

                <div class="flex items-center gap-2">
                    <input type="checkbox" name="is_featured" id="is_featured" value="1"
                        {{ old('is_featured', $post->is_featured ?? false) ? 'checked' : '' }}
                        class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="is_featured" class="text-sm text-gray-700">Featured (tampil di halaman utama)</label>
                </div>

                <div class="flex gap-3 pt-2">
                    <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2.5 px-6 rounded-lg transition">
                        {{ $post ? 'Simpan Perubahan' : 'Simpan' }}
                    </button>
                    <a href="{{ route('admin.posts') }}"
                        class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-2.5 px-6 rounded-lg transition">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layout>
