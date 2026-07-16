# 🏸 Booking Lapangan Tenis

Sistem booking lapangan tenis online untuk **BLUD UPTD PIP2B dan Jasa Konstruksi DISPERKIM**. Dibangun dengan Laravel 12.

## Fitur

- **Booking Lapangan** — Pilih lapangan, tanggal, jam, dan durasi
- **Cek Status Booking** — Lacak status booking via No. HP atau ID Booking
- **Konfirmasi Pembayaran** — Upload bukti transfer atau konfirmasi via WhatsApp
- **Download PDF** — Unduh bukti booking dalam format PDF
- **Dashboard Admin**
  - Statistik booking (total, hari ini, pending, confirmed, pendapatan)
  - Booking per lapangan & tren 6 bulan
  - Kelola status booking & pembayaran
  - Download laporan PDF
- **Manajemen Artikel** — CRUD artikel dengan fitur featured
- **Autentikasi Admin** — Login admin sederhana

## Tech Stack

- **Laravel 12**
- **Tailwind CSS 4** (via Vite)
- **SQLite**
- **Dompdf** (generasi PDF)
- **Chart.js** (grafik dashboard)

## Instalasi

```bash
git clone https://github.com/username/booking-tenis.git
cd booking-tenis
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm install
npm run build
php artisan serve
```

## Login Admin

```
Email:    admin@example.com
Password: password
```

> Ubah kredensial di `database/seeders/DatabaseSeeder.php` sebelum produksi.

## Lisensi

MIT
