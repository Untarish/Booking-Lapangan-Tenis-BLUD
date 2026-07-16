<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="space-y-6">
        @if (session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-md p-6">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
                <h3 class="text-lg font-semibold text-gray-800">Semua Data Booking</h3>
                <form action="{{ route('admin.bookings') }}" method="GET" class="flex flex-col sm:flex-row gap-2">
                    <select name="status"
                        class="rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="">Semua Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed
                        </option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed
                        </option>
                        <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled
                        </option>
                    </select>
                    <select name="payment_status"
                        class="rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="">Semua Pembayaran</option>
                        <option value="unpaid" {{ request('payment_status') == 'unpaid' ? 'selected' : '' }}>Belum
                            Dibayar</option>
                        <option value="waiting_payment"
                            {{ request('payment_status') == 'waiting_payment' ? 'selected' : '' }}>Menunggu</option>
                        <option value="paid" {{ request('payment_status') == 'paid' ? 'selected' : '' }}>Lunas
                        </option>
                    </select>
                    <input type="text" name="search" placeholder="Cari nama/HP..." value="{{ request('search') }}"
                        class="rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm transition">
                        Filter
                    </button>
                </form>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th class="px-4 py-3">ID</th>
                            <th class="px-4 py-3">Nama</th>
                            <th class="px-4 py-3">No. HP</th>
                            <th class="px-4 py-3">Lapangan</th>
                            <th class="px-4 py-3">Tanggal</th>
                            <th class="px-4 py-3">Jam</th>
                            <th class="px-4 py-3">Total</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Pembayaran</th>
                            <th class="px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($bookings as $b)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 font-medium">#{{ $b->id }}</td>
                                <td class="px-4 py-3">{{ $b->nama }}</td>
                                <td class="px-4 py-3">{{ $b->no_hp }}</td>
                                <td class="px-4 py-3">{{ $b->lapangan->nama_lapangan }}</td>
                                <td class="px-4 py-3">{{ \Carbon\Carbon::parse($b->tanggal)->format('d/m/Y') }}</td>
                                <td class="px-4 py-3">{{ $b->jam_mulai }} - {{ $b->jam_selesai }}</td>
                                <td class="px-4 py-3 font-medium">Rp {{ number_format($b->total_harga, 0, ',', '.') }}
                                </td>
                                <td class="px-4 py-3">
                                    @php
                                        $colors = [
                                            'pending' => 'bg-yellow-100 text-yellow-700',
                                            'confirmed' => 'bg-green-100 text-green-700',
                                            'cancelled' => 'bg-red-100 text-red-700',
                                            'completed' => 'bg-blue-100 text-blue-700',
                                        ];
                                    @endphp
                                    <span
                                        class="px-2.5 py-1 rounded-full text-xs font-medium {{ $colors[$b->status] ?? 'bg-gray-100' }}">
                                        {{ ucfirst($b->status) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    @php
                                        $payColors = [
                                            'unpaid' => 'bg-red-100 text-red-700',
                                            'waiting_payment' => 'bg-yellow-100 text-yellow-700',
                                            'paid' => 'bg-green-100 text-green-700',
                                        ];
                                        $payLabels = [
                                            'unpaid' => 'Belum Dibayar',
                                            'waiting_payment' => 'Menunggu Konfirmasi',
                                            'paid' => 'Lunas',
                                        ];
                                    @endphp
                                    <span
                                        class="px-2.5 py-1 rounded-full text-xs font-medium {{ $payColors[$b->payment_status] ?? 'bg-gray-100' }}">
                                        {{ $payLabels[$b->payment_status] ?? $b->payment_status }}
                                    </span>
                                    @if ($b->payment_status === 'waiting_payment' && $b->nama_pengirim)
                                        <div class="text-xs text-gray-500 mt-1">{{ $b->nama_pengirim }} -
                                            {{ $b->tanggal_transfer ? \Carbon\Carbon::parse($b->tanggal_transfer)->format('d/m') : '' }}
                                        </div>
                                    @endif
                                </td>
                                <td class="px-4 py-3 space-y-2 min-w-[180px]">
                                    <form action="{{ route('admin.bookings.status', $b->id) }}" method="POST"
                                        class="flex gap-1 items-center">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status"
                                            class="text-sm rounded border border-gray-300 px-2 py-1.5 focus:outline-none">
                                            <option value="pending" {{ $b->status == 'pending' ? 'selected' : '' }}>
                                                Pending</option>
                                            <option value="confirmed"
                                                {{ $b->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                            <option value="completed"
                                                {{ $b->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                            <option value="cancelled"
                                                {{ $b->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        </select>
                                        <button type="submit"
                                            class="text-indigo-600 hover:text-indigo-800 text-sm font-medium whitespace-nowrap">Update</button>
                                    </form>
                                    <form action="{{ route('admin.bookings.payment', $b->id) }}" method="POST"
                                        class="flex gap-1 items-center">
                                        @csrf
                                        @method('PATCH')
                                        <select name="payment_status"
                                            class="text-sm rounded border border-gray-300 px-2 py-1.5 focus:outline-none">
                                            <option value="unpaid"
                                                {{ $b->payment_status == 'unpaid' ? 'selected' : '' }}>Belum Dibayar
                                            </option>
                                            <option value="waiting_payment"
                                                {{ $b->payment_status == 'waiting_payment' ? 'selected' : '' }}>
                                                Menunggu</option>
                                            <option value="paid"
                                                {{ $b->payment_status == 'paid' ? 'selected' : '' }}>Lunas</option>
                                        </select>
                                        <button type="submit"
                                            class="text-indigo-600 hover:text-indigo-800 text-sm font-medium whitespace-nowrap">Update</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="px-4 py-6 text-center text-gray-500">Tidak ada data booking
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $bookings->links() }}
            </div>
        </div>
    </div>
</x-layout>
