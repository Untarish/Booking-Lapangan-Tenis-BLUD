<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Booking</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 11px;
            color: #374151;
            margin: 0;
            padding: 25px;
        }

        .header {
            text-align: center;
            border-bottom: 3px solid #4338ca;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 18px;
            color: #1e1b4b;
        }

        .header .sub {
            margin: 3px 0 0;
            font-size: 11px;
            color: #6b7280;
        }

        .header .meta {
            margin: 5px 0 0;
            font-size: 9px;
            color: #9ca3af;
        }

        .section {
            margin-bottom: 18px;
        }

        .section-title {
            font-size: 12px;
            font-weight: bold;
            color: #4338ca;
            border-bottom: 2px solid #e0e7ff;
            padding-bottom: 5px;
            margin: 0 0 10px;
        }

        .grid-5 {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        .grid-5 td {
            width: 20%;
            text-align: center;
            padding: 8px 4px;
            border: 1px solid #e5e7eb;
        }

        .grid-5 .num {
            font-size: 20px;
            font-weight: bold;
        }

        .grid-5 .lbl {
            font-size: 8px;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            color: #6b7280;
            margin-top: 2px;
        }

        .grid-5 .clr-total {
            color: #4338ca;
        }

        .grid-5 .clr-today {
            color: #2563eb;
        }

        .grid-5 .clr-pending {
            color: #d97706;
        }

        .grid-5 .clr-confirmed {
            color: #16a34a;
        }

        .grid-5 .clr-revenue {
            color: #7c3aed;
        }

        .status-badge {
            display: inline-block;
            border-radius: 4px;
            padding: 2px 8px;
            font-size: 8px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .sb-pending {
            background: #fef3c7;
            color: #92400e;
        }

        .sb-confirmed {
            background: #d1fae5;
            color: #065f46;
        }

        .sb-completed {
            background: #dbeafe;
            color: #1e40af;
        }

        .sb-cancelled {
            background: #fee2e2;
            color: #991b1b;
        }

        .status-grid {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        .status-grid td {
            width: 20%;
            text-align: center;
            padding: 10px 4px;
            border-radius: 6px;
        }

        .status-grid .val {
            font-size: 18px;
            font-weight: bold;
        }

        .status-grid .lbl {
            font-size: 8px;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            margin-top: 2px;
        }

        .bg-s-pending {
            background: #fffbeb;
        }

        .bg-s-confirmed {
            background: #f0fdf4;
        }

        .bg-s-completed {
            background: #eff6ff;
        }

        .bg-s-cancelled {
            background: #fef2f2;
        }

        .bg-s-revenue {
            background: #f5f3ff;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        .data-table th {
            background: #4338ca;
            color: #fff;
            font-size: 8px;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            padding: 6px 5px;
            text-align: left;
        }

        .data-table td {
            padding: 5px;
            border-bottom: 1px solid #f3f4f6;
            font-size: 9px;
        }

        .data-table tr:nth-child(even) td {
            background: #f9fafb;
        }

        .bar-track {
            height: 16px;
            background: #e5e7eb;
        }

        .bar-fill {
            height: 16px;
            background: #4338ca;
        }

        .month-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        .month-table th {
            background: #4338ca;
            color: #fff;
            font-size: 8px;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            padding: 6px 5px;
            text-align: left;
        }

        .month-table td {
            padding: 5px;
            border-bottom: 1px solid #f3f4f6;
            font-size: 9px;
        }

        .month-table tr:nth-child(even) td {
            background: #f9fafb;
        }

        .month-table .trend-up {
            color: #16a34a;
            font-weight: bold;
        }

        .month-table .trend-down {
            color: #dc2626;
            font-weight: bold;
        }

        .footer {
            text-align: center;
            font-size: 8px;
            color: #9ca3af;
            border-top: 1px solid #e5e7eb;
            padding-top: 10px;
            margin-top: 20px;
        }

        .summary-box {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 6px;
            padding: 10px;
            margin-bottom: 15px;
        }

        .summary-box table {
            width: 100%;
            border-collapse: collapse;
        }

        .summary-box td {
            padding: 3px 6px;
            font-size: 10px;
        }

        .summary-box .lbl {
            color: #6b7280;
        }

        .summary-box .val {
            font-weight: bold;
            color: #1f2937;
        }

        .summary-box .big {
            font-size: 14px;
            color: #059669;
            font-weight: bold;
        }

        .note {
            background: #f9fafb;
            border-radius: 6px;
            padding: 8px;
            margin-top: 10px;
        }

        .note p {
            margin: 2px 0;
            font-size: 9px;
            color: #6b7280;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>LAPORAN BOOKING LAPANGAN TENIS</h1>
        <div class="sub">BLUD UPTD PIP2B dan Jasa Konstruksi DISPERKIM</div>
        <div class="meta">Dicetak: {{ $now->translatedFormat('l, d F Y H:i') }} WIB</div>
    </div>

    <div class="section">
        <div class="section-title">Ringkasan</div>
        <table class="grid-5">
            <tr>
                <td>
                    <div class="num clr-total">{{ $totalBookings }}</div>
                    <div class="lbl">Total Booking</div>
                </td>
                <td>
                    <div class="num clr-today">{{ $todayBookings }}</div>
                    <div class="lbl">Hari Ini</div>
                </td>
                <td>
                    <div class="num clr-pending">{{ $pendingBookings }}</div>
                    <div class="lbl">Pending</div>
                </td>
                <td>
                    <div class="num clr-confirmed">{{ $confirmedBookings }}</div>
                    <div class="lbl">Confirmed</div>
                </td>
                <td>
                    <div class="num clr-revenue">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</div>
                    <div class="lbl">Pendapatan</div>
                </td>
            </tr>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Status Booking</div>
        <table class="status-grid">
            <tr>
                <td class="bg-s-pending">
                    <div class="val" style="color:#d97706;">{{ $pendingBookings }}</div>
                    <div class="lbl" style="color:#92400e;">Menunggu</div>
                </td>
                <td class="bg-s-confirmed">
                    <div class="val" style="color:#16a34a;">{{ $confirmedBookings }}</div>
                    <div class="lbl" style="color:#065f46;">Terkonfirmasi</div>
                </td>
                <td class="bg-s-completed">
                    <div class="val" style="color:#2563eb;">{{ $completedBookings }}</div>
                    <div class="lbl" style="color:#1e40af;">Selesai</div>
                </td>
                <td class="bg-s-cancelled">
                    <div class="val" style="color:#dc2626;">{{ $cancelledBookings }}</div>
                    <div class="lbl" style="color:#991b1b;">Dibatalkan</div>
                </td>
                <td class="bg-s-revenue">
                    <div class="val" style="color:#7c3aed;">Rp {{ number_format($paidRevenue, 0, ',', '.') }}</div>
                    <div class="lbl" style="color:#5b21b6;">Pembayaran Lunas</div>
                </td>
            </tr>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Booking per Lapangan</div>
        @php
            $maxCount = $bookingsByCourt->max('bookings_count') ?: 1;
            $totalCourtBookings = $bookingsByCourt->sum('bookings_count') ?: 1;
            $barColor = '#7c3aed';
        @endphp
        <table class="data-table">
            <thead>
                <tr>
                    <th style="width:6%;">No</th>
                    <th style="width:28%;">Lapangan</th>
                    <th style="width:12%;" class="text-center">Booking</th>
                    <th style="width:12%;" class="text-center">Persentase</th>
                    <th style="width:42%;">Grafik</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($bookingsByCourt as $i => $court)
                    @php
                        $pct = round(($court->bookings_count / $totalCourtBookings) * 100);
                        $barWidth = max(($court->bookings_count / $maxCount) * 100, $court->bookings_count > 0 ? 4 : 0);
                    @endphp
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td><strong>{{ $court->nama_lapangan }}</strong></td>
                        <td class="text-center"><strong>{{ $court->bookings_count }}</strong></td>
                        <td class="text-center">{{ $pct }}%</td>
                        <td>
                            <div style="background:#e5e7eb;height:14px;">
                                <div style="width:{{ $barWidth }}%;height:14px;background:{{ $barColor }};">
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align:center;color:#9ca3af;padding:10px;">Belum ada data booking
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="section-title">Tren Booking 6 Bulan Terakhir</div>
        <table class="month-table">
            <thead>
                <tr>
                    <th>Bulan</th>
                    <th class="text-center">Jumlah Booking</th>
                    <th class="text-right">Pendapatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookingsByMonth as $m)
                    @php
                        $prev = $loop->iteration < 6 ? $bookingsByMonth[$loop->index + 1] ?? null : null;
                        $trend = $prev
                            ? ($m->total - $prev->total > 0
                                ? 'up'
                                : ($m->total - $prev->total < 0
                                    ? 'down'
                                    : 'flat'))
                            : 'flat';
                    @endphp
                    <tr>
                        <td>{{ $monthNames[(int) $m->bulan - 1] }} {{ $m->tahun }}</td>
                        <td class="text-center">
                            {{ $m->total }}
                            @if ($trend === 'up')
                                <span class="trend-up">&#8593;</span>
                            @elseif ($trend === 'down')
                                <span class="trend-down">&#8595;</span>
                            @endif
                        </td>
                        <td class="text-right">Rp {{ number_format($m->revenue, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="section-title">20 Booking Terbaru</div>
        <table class="data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Lapangan</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th class="text-right">Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recentBookings as $b)
                    <tr>
                        <td>#{{ $b->id }}</td>
                        <td>{{ $b->nama }}</td>
                        <td>{{ $b->lapangan->nama_lapangan }}</td>
                        <td>{{ \Carbon\Carbon::parse($b->tanggal)->format('d/m/Y') }}</td>
                        <td>{{ $b->jam_mulai }}-{{ $b->jam_selesai }}</td>
                        <td class="text-right">Rp {{ number_format($b->total_harga, 0, ',', '.') }}</td>
                        <td><span class="status-badge sb-{{ $b->status }}">{{ ucfirst($b->status) }}</span></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="summary-box">
        <table>
            <tr>
                <td class="lbl">Total Seluruh Booking</td>
                <td class="val">{{ $totalBookings }}</td>
                <td class="lbl">Pending</td>
                <td class="val">{{ $pendingBookings }}</td>
                <td class="lbl">Terkonfirmasi</td>
                <td class="val">{{ $confirmedBookings }}</td>
                <td class="lbl">Selesai</td>
                <td class="val">{{ $completedBookings }}</td>
            </tr>
            <tr>
                <td class="lbl">Total Pendapatan</td>
                <td class="big" colspan="7">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</td>
            </tr>
        </table>
    </div>

    <div class="note">
        <p>Laporan ini dicetak secara otomatis dari sistem Booking Lapangan Tenis BLUD UPTD PIP2B dan Jasa Konstruksi
            DISPERKIM.</p>
        <p>Data mencakup seluruh booking yang tercatat hingga tanggal cetak.</p>
    </div>

    <div class="footer">
        &copy; {{ $now->year }} BLUD UPTD PIP2B dan Jasa Konstruksi DISPERKIM &mdash; Laporan dicetak
        {{ $now->translatedFormat('d F Y H:i') }} WIB
    </div>
</body>

</html>
