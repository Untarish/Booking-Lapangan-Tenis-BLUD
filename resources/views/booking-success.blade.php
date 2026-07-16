<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 text-center">
            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Booking Berhasil!</h2>
            <p class="text-gray-500 mb-6">Terima kasih, data booking Anda telah kami terima.</p>

            <div class="bg-gray-50 rounded-xl p-6 text-left space-y-3">
                <h3 class="font-semibold text-gray-700 border-b pb-2">Detail Booking</h3>
                <div class="grid grid-cols-2 gap-2 text-sm">
                    <span class="text-gray-500">Kode Booking</span>
                    <span class="font-semibold text-gray-800">#{{ $booking->id }}</span>

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
                    <span class="font-semibold text-gray-800">{{ $booking->jam_mulai }} - {{ $booking->jam_selesai }}
                        WIB</span>

                    <span class="text-gray-500">Durasi</span>
                    <span class="font-semibold text-gray-800">{{ $booking->durasi }} Jam</span>

                    <span class="text-gray-500">Total Bayar</span>
                    <span class="font-semibold text-green-600 text-lg">Rp
                        {{ number_format($booking->total_harga, 0, ',', '.') }}</span>
                </div>
            </div>

            <div class="mt-6 bg-blue-50 border border-blue-200 rounded-xl p-5 text-left">
                <h3 class="font-semibold text-blue-800 mb-3 text-center">Lakukan Pembayaran ke Rekening BLUD</h3>
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
                <p class="text-xs text-gray-500 mt-3 text-center">Setelah transfer, konfirmasi pembayaran Anda melalui
                    tombol di bawah</p>
            </div>

            <div class="mt-6 space-y-3">
                <a href="{{ route('booking.tracking') }}?q={{ $booking->no_hp }}"
                    class="inline-block w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-xl transition duration-200">
                    Saya Sudah Bayar — Konfirmasi Sekarang
                </a>
                <div class="flex flex-col sm:flex-row gap-3 justify-center">
                    <a href="/booking"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2.5 px-6 rounded-xl transition duration-200 text-sm text-center">
                        Booking Lagi
                    </a>
                    <a href="/"
                        class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-2.5 px-6 rounded-xl transition duration-200 text-sm text-center">
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
