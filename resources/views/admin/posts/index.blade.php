<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="space-y-6">
        @if (session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-md p-6">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 mb-6">
                <h3 class="text-lg font-semibold text-gray-800">Semua Artikel</h3>
                <a href="{{ route('admin.posts.create') }}"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2.5 rounded-lg transition text-center">
                    + Tambah Artikel
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th class="px-4 py-3">Judul</th>
                            <th class="px-4 py-3">Penulis</th>
                            <th class="px-4 py-3">Tanggal</th>
                            <th class="px-4 py-3">Gambar</th>
                            <th class="px-4 py-3">Featured</th>
                            <th class="px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($posts as $p)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 font-medium max-w-xs truncate">{{ $p->title }}</td>
                                <td class="px-4 py-3">{{ $p->author }}</td>
                                <td class="px-4 py-3">{{ $p->created_at->format('d/m/Y') }}</td>
                                <td class="px-4 py-3">
                                    @if ($p->image)
                                        <img src="{{ asset($p->image) }}" alt=""
                                            class="w-16 h-10 object-cover rounded">
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    @if ($p->is_featured)
                                        <span
                                            class="bg-yellow-100 text-yellow-700 text-xs font-medium px-2.5 py-1 rounded-full">Featured</span>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex gap-3 items-center">
                                        <a href="{{ route('admin.posts.edit', $p->id) }}"
                                            class="text-indigo-600 hover:text-indigo-800 text-sm font-medium px-2 py-1">Edit</a>
                                        <form action="{{ route('admin.posts.destroy', $p->id) }}" method="POST"
                                            onsubmit="return confirm('Hapus artikel ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:text-red-800 text-sm font-medium px-2 py-1">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-6 text-center text-gray-500">Belum ada artikel</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</x-layout>
