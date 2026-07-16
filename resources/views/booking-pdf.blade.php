<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Booking #{{ $booking->id }}</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
            color: #374151;
            margin: 0;
            padding: 25px;
        }

        .header {
            text-align: center;
            margin-bottom: 25px;
            border-bottom: 3px solid #4338ca;
            padding-bottom: 18px;
        }

        .header .logo-title {
            font-size: 18px;
            font-weight: bold;
            color: #1e1b4b;
            margin: 0;
        }

        .header .logo-sub {
            font-size: 11px;
            color: #6b7280;
            margin: 3px 0 0;
        }

        .header .booking-id {
            font-size: 10px;
            color: #9ca3af;
            margin: 2px 0 0;
        }

        .card {
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 18px;
            margin-bottom: 18px;
        }

        .card-title {
            font-size: 13px;
            font-weight: bold;
            color: #4338ca;
            margin: 0 0 12px;
            padding-bottom: 8px;
            border-bottom: 2px solid #e0e7ff;
        }

        .detail-table {
            width: 100%;
            border-collapse: collapse;
        }

        .detail-table td {
            padding: 6px 8px;
            font-size: 11px;
        }

        .detail-table .label {
            color: #6b7280;
            width: 35%;
        }

        .detail-table .value {
            font-weight: bold;
            color: #1f2937;
        }

        .detail-table tr:nth-child(even) td {
            background: #f9fafb;
        }

        .detail-table .total-label {
            font-size: 13px;
            color: #4b5563;
            font-weight: bold;
        }

        .detail-table .total-value {
            font-size: 16px;
            color: #059669;
            font-weight: bold;
        }

        .status-row {
            margin-bottom: 25px;
        }

        .status-row td {
            padding: 0 4px;
        }

        .status-box {
            text-align: center;
            padding: 10px;
            border-radius: 6px;
        }

        .status-box .label {
            font-size: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 3px;
        }

        .status-box .value {
            font-size: 12px;
            font-weight: bold;
        }

        .bg-pending {
            background: #fffbeb;
            color: #d97706;
        }

        .bg-confirmed {
            background: #f0fdf4;
            color: #16a34a;
        }

        .bg-completed {
            background: #eff6ff;
            color: #2563eb;
        }

        .bg-cancelled {
            background: #fef2f2;
            color: #dc2626;
        }

        .bg-unpaid {
            background: #fef2f2;
            color: #dc2626;
        }

        .bg-waiting_payment {
            background: #fffbeb;
            color: #d97706;
        }

        .bg-paid {
            background: #f0fdf4;
            color: #16a34a;
        }

        .payment-info {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 6px;
            padding: 12px;
            margin-top: 15px;
        }

        .payment-info h4 {
            margin: 0 0 8px;
            font-size: 11px;
            color: #166534;
        }

        .payment-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 11px;
        }

        .payment-table td {
            padding: 4px 6px;
        }

        .payment-table .label {
            color: #6b7280;
            width: 40%;
        }

        .payment-table .value {
            font-weight: bold;
            color: #1f2937;
        }

        .payment-table .total {
            font-size: 13px;
            color: #059669;
            font-weight: bold;
        }

        .divider {
            border: none;
            border-top: 1px dashed #d1d5db;
            margin: 15px 0;
        }

        .footer {
            text-align: center;
            font-size: 9px;
            color: #9ca3af;
            border-top: 1px solid #e5e7eb;
            padding-top: 12px;
            margin-top: 25px;
        }

        .info-note {
            background: #f9fafb;
            border-radius: 6px;
            padding: 10px;
            margin-top: 15px;
        }

        .info-note p {
            margin: 2px 0;
            font-size: 10px;
            color: #6b7280;
        }

        .checklist {
            margin: 12px 0;
        }

        .checklist .item {
            font-size: 10px;
            color: #6b7280;
            margin: 4px 0;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="logo-title">BLUD UPTD PIP2B dan Jasa Konstruksi</div>
        <div class="logo-sub">Booking Lapangan Tenis - Bukti Booking</div>
        <div class="booking-id">Kode Booking: #{{ $booking->id }}</div>
    </div>

    <table class="status-row" cellpadding="0" cellspacing="0">
        <tr>
            <td width="33%">
                <div class="status-box bg-{{ $booking->status }}">
                    <div class="label">Status Booking</div>
                    <div class="value">
                        @switch($booking->status)
                            @case('pending')
                                Menunggu
                            @break

                            @case('confirmed')
                                Terkonfirmasi
                            @break

                            @case('completed')
                                Selesai
                            @break

                            @case('cancelled')
                                Dibatalkan
                            @break

                            @default
                                {{ ucfirst($booking->status) }}
                        @endswitch
                    </div>
                </div>
            </td>
            <td width="33%">
                <div class="status-box bg-{{ $booking->payment_status ?: 'unpaid' }}">
                    <div class="label">Status Pembayaran</div>
                    <div class="value">
                        @switch($booking->payment_status)
                            @case('paid')
                                Lunas
                            @break

                            @case('waiting_payment')
                                Menunggu
                            @break

                            @default
                                Belum Dibayar
                        @endswitch
                    </div>
                </div>
            </td>
            <td width="33%">
                <div class="status-box bg-paid">
                    <div class="label">Total Pembayaran</div>
                    <div class="value">Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</div>
                </div>
            </td>
        </tr>
    </table>

    <div class="card">
        <div class="card-title">Detail Penyewa</div>
        <table class="detail-table">
            <tr>
                <td class="label">Nama Lengkap</td>
                <td class="value">{{ $booking->nama }}</td>
            </tr>
            <tr>
                <td class="label">No. Handphone</td>
                <td class="value">{{ $booking->no_hp }}</td>
            </tr>
            @if ($booking->email)
                <tr>
                    <td class="label">Email</td>
                    <td class="value">{{ $booking->email }}</td>
                </tr>
            @endif
        </table>
    </div>

    <div class="card">
        <div class="card-title">Detail Lapangan</div>
        <table class="detail-table">
            <tr>
                <td class="label">Lapangan</td>
                <td class="value">{{ $booking->lapangan->nama_lapangan }}</td>
            </tr>
            <tr>
                <td class="label">Tanggal</td>
                <td class="value">{{ \Carbon\Carbon::parse($booking->tanggal)->translatedFormat('l, d F Y') }}</td>
            </tr>
            <tr>
                <td class="label">Jam Main</td>
                <td class="value">{{ $booking->jam_mulai }} - {{ $booking->jam_selesai }} WIB</td>
            </tr>
            <tr>
                <td class="label">Durasi</td>
                <td class="value">{{ $booking->durasi }} Jam</td>
            </tr>
            <tr>
                <td class="label">Harga per Jam</td>
                <td class="value">Rp {{ number_format($booking->harga_per_jam, 0, ',', '.') }}</td>
            </tr>
        </table>
    </div>

    <div class="card">
        <div class="card-title">Rincian Pembayaran</div>
        <table class="detail-table">
            <tr>
                <td class="label">Harga per Jam</td>
                <td class="value">Rp {{ number_format($booking->harga_per_jam, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td class="label">Durasi</td>
                <td class="value">{{ $booking->durasi }} Jam</td>
            </tr>
            @php
                $subtotal = $booking->harga_per_jam * $booking->durasi;
                $diskon = $subtotal - $booking->total_harga;
            @endphp
            @if ($diskon > 0)
                <tr>
                    <td class="label">Subtotal</td>
                    <td class="value">Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td class="label">Diskon Pagi (20%)</td>
                    <td class="value" style="color:#dc2626;">- Rp {{ number_format($diskon, 0, ',', '.') }}</td>
                </tr>
            @endif
            <tr>
                <td class="total-label">Total Bayar</td>
                <td class="total-value">Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</td>
            </tr>
        </table>
    </div>

    @if ($booking->payment_status !== 'paid')
        <div class="payment-info">
            <h4>Informasi Pembayaran</h4>
            <table class="payment-table">
                <tr>
                    <td class="label">Bank</td>
                    <td class="value">Bank Sumsel Babel</td>
                </tr>
                <tr>
                    <td class="label">No. Rekening</td>
                    <td class="value">1234567890</td>
                </tr>
                <tr>
                    <td class="label">Atas Nama</td>
                    <td class="value">BLUD UPTD PIP2B</td>
                </tr>
                <tr>
                    <td class="label">Total Transfer</td>
                    <td class="total">Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</td>
                </tr>
            </table>
        </div>
    @endif

    <hr class="divider">

    <div class="info-note">
        <p>Terima kasih telah melakukan booking di lapangan tenis kami.</p>
        <p>Harap datang 15 menit sebelum jadwal bermain.</p>
        <p>Untuk informasi lebih lanjut hubungi 0812-7314-3692</p>
    </div>

    <div class="footer">
        Dicetak pada {{ now()->translatedFormat('l, d F Y H:i') }} WIB &mdash; BLUD UPTD PIP2B dan Jasa Konstruksi
        DISPERKIM
    </div>
</body>

</html>
