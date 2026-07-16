<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="max-w-2xl mx-auto space-y-6">
        @if (!isset($booking))
            <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-2 text-center">Cek Status Booking</h2>
                <p class="text-gray-500 text-center mb-6">Masukkan No. HP atau ID Booking untuk cek status pembayaran</p>

                <form action="{{ route('booking.tracking') }}" method="GET" class="space-y-4">
                    <div>
                        <label for="q" class="block text-sm font-semibold text-gray-700 mb-1">No. HP atau ID
                            Booking</label>
                        <input type="text" name="q" id="q" value="{{ request('q') }}" required
                            placeholder="Contoh: 08123456789 atau #1"
                            class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <button type="submit"
                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2.5 px-6 rounded-xl transition duration-200 shadow-md">
                        Cek Booking
                    </button>
                </form>

            </div>
        @else
            <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Detail Booking</h2>
                    <span class="text-sm text-gray-400">#{{ $booking->id }}</span>
                </div>

                @if (session('success'))
                    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @php
                    $statusColors = [
                        'pending' => 'bg-yellow-100 text-yellow-700',
                        'confirmed' => 'bg-blue-100 text-blue-700',
                        'completed' => 'bg-green-100 text-green-700',
                        'cancelled' => 'bg-red-100 text-red-700',
                    ];
                    $paymentColors = [
                        'unpaid' => 'bg-red-100 text-red-700',
                        'waiting_payment' => 'bg-yellow-100 text-yellow-700',
                        'paid' => 'bg-green-100 text-green-700',
                    ];
                @endphp

                <div class="flex flex-wrap gap-3 mb-6">
                    <div class="flex-1 min-w-[140px]">
                        <p class="text-xs text-gray-500 mb-1">Status Booking</p>
                        <span
                            class="inline-block px-3 py-1.5 rounded-full text-sm font-medium {{ $statusColors[$booking->status] ?? 'bg-gray-100' }}">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </div>
                    <div class="flex-1 min-w-[140px]">
                        <p class="text-xs text-gray-500 mb-1">Status Pembayaran</p>
                        <span
                            class="inline-block px-3 py-1.5 rounded-full text-sm font-medium {{ $paymentColors[$booking->payment_status] ?? 'bg-gray-100' }}">
                            @switch($booking->payment_status)
                                @case('unpaid')
                                    Belum Dibayar
                                @break

                                @case('waiting_payment')
                                    Menunggu Pembayaran
                                @break

                                @case('paid')
                                    Lunas
                                @break

                                @default
                                    {{ $booking->payment_status }}
                            @endswitch
                        </span>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-xl p-5 space-y-3 mb-6">
                    <div class="grid grid-cols-2 gap-2 text-sm">
                        <span class="text-gray-500">Nama</span>
                        <span class="font-semibold text-gray-800">{{ $booking->nama }}</span>

                        <span class="text-gray-500">No. HP</span>
                        <span class="font-semibold text-gray-800">{{ $booking->no_hp }}</span>

                        <span class="text-gray-500">Lapangan</span>
                        <span class="font-semibold text-gray-800">{{ $booking->lapangan->nama_lapangan }}</span>

                        <span class="text-gray-500">Tanggal</span>
                        <span
                            class="font-semibold text-gray-800">{{ \Carbon\Carbon::parse($booking->tanggal)->translatedFormat('l, d F Y') }}</span>

                        <span class="text-gray-500">Jam</span>
                        <span class="font-semibold text-gray-800">{{ $booking->jam_mulai }} -
                            {{ $booking->jam_selesai }} WIB</span>

                        <span class="text-gray-500">Durasi</span>
                        <span class="font-semibold text-gray-800">{{ $booking->durasi }} Jam</span>

                        <span class="text-gray-500">Total Bayar</span>
                        <span class="font-semibold text-green-600 text-lg">Rp
                            {{ number_format($booking->total_harga, 0, ',', '.') }}</span>
                    </div>
                </div>

                @if ($booking->status === 'confirmed' && $booking->payment_status !== 'paid')
                    <div class="bg-blue-50 border border-blue-200 rounded-xl p-5">
                        <h3 class="font-semibold text-blue-800 mb-3 text-center">Pembayaran via Transfer Bank</h3>
                        <p class="text-sm text-blue-600 mb-4 text-center">Lakukan transfer ke rekening berikut:</p>
                        <div class="bg-white rounded-lg p-4 space-y-2 text-sm">
                            <div class="flex justify-between"><span class="text-gray-500">Bank</span><span
                                    class="font-semibold">Bank Sumsel Babel</span></div>
                            <div class="flex justify-between"><span class="text-gray-500">No. Rekening</span><span
                                    class="font-semibold">1234567890</span></div>
                            <div class="flex justify-between"><span class="text-gray-500">Atas Nama</span><span
                                    class="font-semibold">BLUD UPTD PIP2B</span></div>
                            <hr class="border-blue-200">
                            <div class="flex justify-between"><span class="text-gray-500">Total Transfer</span><span
                                    class="font-semibold text-green-600 text-base">Rp
                                    {{ number_format($booking->total_harga, 0, ',', '.') }}</span></div>
                        </div>

                        <div class="mt-4 pt-4 border-t border-blue-200">
                            <h4 class="text-sm font-semibold text-blue-800 mb-3">Konfirmasi Pembayaran</h4>
                            <form action="{{ route('booking.confirm-payment', $booking->id) }}" method="POST"
                                class="space-y-3">
                                @csrf
                                <div>
                                    <label class="text-sm text-blue-600 block mb-1">Nama Pengirim</label>
                                    <input type="text" name="nama_pengirim" required
                                        placeholder="Nama sesuai rekening"
                                        class="w-full rounded-lg border border-blue-200 px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="text-sm text-blue-600 block mb-1">Bank Tujuan</label>
                                    <input type="text" name="bank_tujuan" value="Bank Sumsel Babel" readonly
                                        class="w-full rounded-lg border border-blue-200 px-3 py-2.5 text-sm bg-blue-50/50">
                                </div>
                                <div>
                                    <label class="text-sm text-blue-600 block mb-1">Tanggal Transfer</label>
                                    <input type="date" name="tanggal_transfer" required max="{{ date('Y-m-d') }}"
                                        class="w-full rounded-lg border border-blue-200 px-3 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="text-sm text-blue-600 block mb-1">Jumlah Transfer</label>
                                    <input type="text"
                                        value="Rp {{ number_format($booking->total_harga, 0, ',', '.') }}" disabled
                                        class="w-full rounded-lg border border-blue-200 px-3 py-2.5 text-sm bg-blue-50/50">
                                </div>
                                <button type="submit"
                                    class="w-full bg-green-600 hover:bg-green-700 text-white text-sm font-semibold py-3 rounded-lg transition">
                                    Kirim Konfirmasi Pembayaran
                                </button>
                            </form>
                            <p class="text-xs text-gray-500 mt-3 text-center">Atau konfirmasi via WhatsApp</p>
                            <div class="mt-2 text-center">
                                <a href="https://wa.me/6281273143692?text=Konfirmasi%20Pembayaran%20Booking%20%23{{ $booking->id }}%20-%20Rp%20{{ number_format($booking->total_harga, 0, ',', '.') }}"
                                    class="inline-flex items-center gap-1 bg-green-600 hover:bg-green-700 text-white text-sm font-medium px-4 py-2 rounded-lg transition">
                                    Konfirmasi via WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>
                @elseif ($booking->payment_status === 'paid')
                    <div class="bg-green-50 border border-green-200 rounded-xl p-5 text-center">
                        <svg class="w-12 h-12 text-green-500 mx-auto mb-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h3 class="font-semibold text-green-800">Pembayaran Lunas</h3>
                        <p class="text-sm text-green-600">Terima kasih, pembayaran Anda telah diterima.</p>
                    </div>
                @elseif ($booking->status === 'pending')
                    <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-5 text-center">
                        <svg class="w-12 h-12 text-yellow-500 mx-auto mb-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h3 class="font-semibold text-yellow-800">Menunggu Konfirmasi Admin</h3>
                        <p class="text-sm text-yellow-600">Booking Anda akan segera dikonfirmasi oleh admin.</p>
                    </div>
                @endif

                <div class="mt-6 flex flex-col sm:flex-row gap-3 justify-center">
                    <a href="{{ route('booking.download-pdf', $booking->id) }}"
                        class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2.5 px-6 rounded-xl transition text-sm text-center">
                        Download PDF
                    </a>
                    <a href="/booking"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2.5 px-6 rounded-xl transition text-sm text-center">
                        Booking Lagi
                    </a>
                    <a href="{{ route('booking.tracking') }}"
                        class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-2.5 px-6 rounded-xl transition text-sm text-center">
                        Cek Booking Lain
                    </a>
                </div>

            </div>
        @endif
    </div>
</x-layout>
