<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="space-y-6">
        @if (session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
            <div class="bg-white rounded-xl shadow-md p-5 border-l-4 border-indigo-500">
                <p class="text-sm text-gray-500">Total Booking</p>
                <p class="text-3xl font-bold text-gray-800">{{ $totalBookings }}</p>
            </div>
            <div class="bg-white rounded-xl shadow-md p-5 border-l-4 border-blue-500">
                <p class="text-sm text-gray-500">Hari Ini</p>
                <p class="text-3xl font-bold text-blue-600">{{ $todayBookings }}</p>
            </div>
            <div class="bg-white rounded-xl shadow-md p-5 border-l-4 border-yellow-500">
                <p class="text-sm text-gray-500">Pending</p>
                <p class="text-3xl font-bold text-yellow-600">{{ $pendingBookings }}</p>
            </div>
            <div class="bg-white rounded-xl shadow-md p-5 border-l-4 border-green-500">
                <p class="text-sm text-gray-500">Confirmed</p>
                <p class="text-3xl font-bold text-green-600">{{ $confirmedBookings }}</p>
            </div>
            <div class="bg-white rounded-xl shadow-md p-5 border-l-4 border-purple-500">
                <p class="text-sm text-gray-500">Pendapatan</p>
                <p class="text-3xl font-bold text-purple-600">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Booking per Lapangan</h3>
                <div class="space-y-4">
                    @foreach ($bookingsByCourt as $court)
                        <div>
                            <div class="flex justify-between text-sm mb-1">
                                <span class="font-medium text-gray-700">{{ $court->nama_lapangan }}</span>
                                <span class="text-gray-600">{{ $court->bookings_count }} booking</span>
                            </div>
                            @php
                                $maxCount = $bookingsByCourt->max('bookings_count') ?: 1;
                                $width = ($court->bookings_count / $maxCount) * 100;
                            @endphp
                            <div class="w-full bg-gray-100 rounded-full h-2.5">
                                <div class="bg-indigo-500 h-2.5 rounded-full transition-all duration-500"
                                    style="width: {{ $width }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Tren Booking 6 Bulan</h3>
                <canvas id="chartBooking" class="max-h-64 w-full"></canvas>
            </div>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('admin.dashboard.laporan-pdf') }}"
                class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white font-semibold py-2.5 px-5 rounded-xl transition text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Download Laporan PDF
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-md p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Booking Terbaru</h3>
                <a href="{{ route('admin.bookings') }}" class="text-sm text-indigo-600 hover:underline">Lihat Semua</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th class="px-4 py-3">#</th>
                            <th class="px-4 py-3">Nama</th>
                            <th class="px-4 py-3">Lapangan</th>
                            <th class="px-4 py-3">Tanggal</th>
                            <th class="px-4 py-3">Jam</th>
                            <th class="px-4 py-3">Total</th>
                            <th class="px-4 py-3">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($recentBookings as $b)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 font-medium">#{{ $b->id }}</td>
                                <td class="px-4 py-3">{{ $b->nama }}</td>
                                <td class="px-4 py-3">{{ $b->lapangan->nama_lapangan }}</td>
                                <td class="px-4 py-3">{{ \Carbon\Carbon::parse($b->tanggal)->format('d/m/Y') }}</td>
                                <td class="px-4 py-3">{{ $b->jam_mulai }} - {{ $b->jam_selesai }}</td>
                                <td class="px-4 py-3 font-medium">Rp {{ number_format($b->total_harga, 0, ',', '.') }}
                                </td>
                                <td class="px-4 py-3">
                                    @php
                                        $statusColors = [
                                            'pending' => 'bg-yellow-100 text-yellow-700',
                                            'confirmed' => 'bg-green-100 text-green-700',
                                            'cancelled' => 'bg-red-100 text-red-700',
                                            'completed' => 'bg-blue-100 text-blue-700',
                                        ];
                                    @endphp
                                    <span
                                        class="px-2.5 py-1 rounded-full text-xs font-medium {{ $statusColors[$b->status] ?? 'bg-gray-100' }}">
                                        {{ ucfirst($b->status) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-4 py-6 text-center text-gray-500">Belum ada booking</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const months = @json($bookingsByMonth->pluck('bulan'));
        const counts = @json($bookingsByMonth->pluck('total'));

        const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        const labels = months.map(m => monthNames[parseInt(m) - 1]);

        new Chart(document.getElementById('chartBooking'), {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Booking',
                    data: counts,
                    backgroundColor: 'rgba(99, 102, 241, 0.7)',
                    borderColor: 'rgb(99, 102, 241)',
                    borderWidth: 1,
                    borderRadius: 4,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    });
</script>
