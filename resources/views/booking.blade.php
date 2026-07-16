<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Form Booking Lapangan Tenis</h2>

            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('booking.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="nama" class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required
                            class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div>
                        <label for="no_hp" class="block text-sm font-semibold text-gray-700 mb-1">No. Handphone <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp') }}" required
                            class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div class="md:col-span-2">
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email
                            (opsional)</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                            class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">Pilih Lapangan <span
                            class="text-red-500">*</span></label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4" id="lapangan-container">
                        @foreach ($lapangan as $l)
                            <label
                                class="lapangan-card relative border-2 rounded-xl p-4 cursor-pointer transition-all duration-200 hover:shadow-md border-gray-200"
                                data-lapangan-id="{{ $l->id }}">
                                <input type="radio" name="lapangan_id" value="{{ $l->id }}"
                                    class="absolute opacity-0 peer" required>
                                <div
                                    class="peer-checked:ring-2 peer-checked:ring-indigo-500 peer-checked:border-indigo-500 rounded-lg p-1">
                                    @if ($l->foto)
                                        <img src="{{ asset($l->foto) }}" alt="{{ $l->nama_lapangan }}"
                                            class="w-full h-32 object-cover rounded-lg mb-2">
                                    @else
                                        <div
                                            class="w-full h-32 bg-gray-100 rounded-lg mb-2 flex items-center justify-center text-gray-400">
                                            Lapangan Tenis
                                        </div>
                                    @endif
                                    <h4 class="font-semibold text-gray-800">{{ $l->nama_lapangan }}</h4>
                                    <p class="text-sm text-gray-500">{{ $l->deskripsi }}</p>
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label for="tanggal" class="block text-sm font-semibold text-gray-700 mb-1">Pilih Tanggal <span
                                class="text-red-500">*</span></label>
                        <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal') }}" required
                            min="{{ date('Y-m-d') }}"
                            class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div>
                        <label for="jam_mulai" class="block text-sm font-semibold text-gray-700 mb-1">Jam Mulai <span
                                class="text-red-500">*</span></label>
                        <select name="jam_mulai" id="jam_mulai" required
                            class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="">Pilih jam</option>
                        </select>
                        <p id="slot-info" class="text-xs text-gray-400 mt-1">Pilih tanggal dan lapangan terlebih dahulu
                        </p>
                    </div>
                    <div>
                        <label for="durasi" class="block text-sm font-semibold text-gray-700 mb-1">Durasi <span
                                class="text-red-500">*</span></label>
                        <select name="durasi" id="durasi" required
                            class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="">Pilih durasi</option>
                            <option value="1">1 Jam</option>
                            <option value="2">2 Jam</option>
                            <option value="3">3 Jam</option>
                        </select>
                    </div>
                </div>

                <div id="harga-container"
                    class="hidden bg-gradient-to-r from-indigo-50 to-blue-50 rounded-xl p-6 border border-indigo-200">
                    <h3 class="text-lg font-semibold text-indigo-700 mb-3">Ringkasan Harga</h3>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between text-gray-600">
                            <span>Harga per jam</span>
                            <span id="harga-per-jam">Rp 0</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Durasi</span>
                            <span id="durasi-text">-</span>
                        </div>
                        <div id="diskon-row" class="hidden flex justify-between text-green-600">
                            <span>Diskon Pagi (20%)</span>
                            <span id="diskon-nominal">-Rp 0</span>
                        </div>
                        <hr class="border-indigo-200">
                        <div class="flex justify-between text-lg font-bold text-indigo-700">
                            <span>Total</span>
                            <span id="total-harga">Rp 0</span>
                        </div>
                    </div>
                </div>

                <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-6 rounded-xl transition duration-200 shadow-lg hover:shadow-xl">
                    Booking Sekarang
                </button>
            </form>
        </div>
    </div>
</x-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const lapanganRadios = document.querySelectorAll('input[name="lapangan_id"]');
        const tanggalInput = document.getElementById('tanggal');
        const jamMulaiSelect = document.getElementById('jam_mulai');
        const durasiSelect = document.getElementById('durasi');
        const hargaContainer = document.getElementById('harga-container');
        const hargaPerJamEl = document.getElementById('harga-per-jam');
        const durasiTextEl = document.getElementById('durasi-text');
        const totalHargaEl = document.getElementById('total-harga');
        const diskonRow = document.getElementById('diskon-row');
        const diskonNominal = document.getElementById('diskon-nominal');
        const slotInfo = document.getElementById('slot-info');

        const lapanganCards = document.querySelectorAll('.lapangan-card');

        lapanganCards.forEach(card => {
            card.addEventListener('click', function() {
                lapanganCards.forEach(c => c.classList.remove('border-indigo-500',
                    'bg-indigo-50'));
                this.classList.add('border-indigo-500', 'bg-indigo-50');
                const radio = this.querySelector('input[type="radio"]');
                radio.checked = true;
                loadAvailableSlots();
            });
        });

        tanggalInput.addEventListener('change', loadAvailableSlots);

        jamMulaiSelect.addEventListener('change', hitungHarga);
        durasiSelect.addEventListener('change', hitungHarga);

        function getSelectedLapangan() {
            const checked = document.querySelector('input[name="lapangan_id"]:checked');
            return checked ? checked.value : null;
        }

        function loadAvailableSlots() {
            const lapanganId = getSelectedLapangan();
            const tanggal = tanggalInput.value;

            jamMulaiSelect.innerHTML = '<option value="">Pilih jam</option>';
            hargaContainer.classList.add('hidden');

            if (!lapanganId || !tanggal) {
                slotInfo.textContent = 'Pilih tanggal dan lapangan terlebih dahulu';
                return;
            }

            slotInfo.textContent = 'Memuat slot tersedia...';

            fetch(`/booking/available-slots?lapangan_id=${lapanganId}&tanggal=${tanggal}`)
                .then(res => res.json())
                .then(slots => {
                    jamMulaiSelect.innerHTML = '<option value="">Pilih jam</option>';
                    const availableSlots = slots.filter(s => s.available);
                    const bookedSlots = slots.filter(s => !s.available);

                    if (availableSlots.length === 0) {
                        slotInfo.textContent = 'Tidak ada slot tersedia untuk tanggal ini';
                        return;
                    }

                    slotInfo.textContent = `${availableSlots.length} slot tersedia`;

                    availableSlots.forEach(slot => {
                        const option = document.createElement('option');
                        option.value = slot.jam;
                        option.textContent = slot.label;
                        jamMulaiSelect.appendChild(option);
                    });
                })
                .catch(() => {
                    slotInfo.textContent = 'Gagal memuat slot. Silakan coba lagi.';
                });
        }

        function hitungHarga() {
            const lapanganId = getSelectedLapangan();
            const tanggal = tanggalInput.value;
            const jamMulai = jamMulaiSelect.value;
            const durasi = durasiSelect.value;

            if (!lapanganId || !tanggal || !jamMulai || !durasi) {
                hargaContainer.classList.add('hidden');
                return;
            }

            fetch(
                    `/booking/hitung-harga?lapangan_id=${lapanganId}&tanggal=${tanggal}&jam_mulai=${jamMulai}&durasi=${durasi}`
                    )
                .then(res => res.json())
                .then(data => {
                    hargaContainer.classList.remove('hidden');
                    hargaPerJamEl.textContent = formatRupiah(data.harga_per_jam);
                    durasiTextEl.textContent = durasi + ' Jam';
                    totalHargaEl.textContent = formatRupiah(data.total_harga);

                    if (data.diskon > 0) {
                        diskonRow.classList.remove('hidden');
                        diskonNominal.textContent = '- ' + formatRupiah(data.diskon);
                    } else {
                        diskonRow.classList.add('hidden');
                    }
                })
                .catch(() => {
                    hargaContainer.classList.add('hidden');
                });
        }

        function formatRupiah(angka) {
            return 'Rp ' + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }
    });
</script>
