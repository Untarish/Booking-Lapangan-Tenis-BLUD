<?php

namespace Database\Seeders;

use App\Models\Lapangan;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@bookingtenis.com',
            'password' => bcrypt('admin123'),
        ]);

        Lapangan::create([
            'nama_lapangan' => 'Lapangan 1',
            'foto' => 'img/L1.jpg',
            'deskripsi' => 'Lapangan utama dengan kualitas terbaik, cocok untuk pertandingan dan latihan',
            'harga_weekday' => 70000,
            'harga_weekend' => 100000,
            'is_active' => true,
        ]);

        Lapangan::create([
            'nama_lapangan' => 'Lapangan 2',
            'foto' => 'img/L4.jpg',
            'deskripsi' => 'Lapangan dengan pencahayaan optimal, nyaman untuk bermain di malam hari',
            'harga_weekday' => 70000,
            'harga_weekend' => 100000,
            'is_active' => true,
        ]);

        Post::create([
            'title' => 'Tips Memilih Jadwal Booking Lapangan Tenis',
            'slug' => 'tips-memilih-jadwal-booking-lapangan-tenis',
            'author' => 'Untari Safitri Hidayati',
            'excerpt' => 'Pilih waktu booking yang tepat agar pengalaman bermain tenis Anda lebih maksimal. Simak tips berikut ini.',
            'body' => 'Booking lapangan tenis kini semakin mudah dengan sistem online. Namun, agar pengalaman bermain Anda lebih maksimal, ada beberapa tips yang perlu diperhatikan.

1. Pilih Waktu yang Tepat
Hindari jam sibuk seperti sore hari (16.00 - 18.00) jika Anda ingin bermain lebih santai. Pagi hari adalah waktu terbaik untuk bermain dengan nyaman.

2. Manfaatkan Diskon Pagi
Kami memberikan diskon 20% untuk booking pada slot pagi (sebelum jam 12:00). Ini adalah kesempatan bagus untuk berhemat.

3. Booking Lebih Awal
Jangan menunggu hingga hari-H. Bookinglah minimal H-1 untuk memastikan lapangan yang Anda inginkan masih tersedia.

4. Sesuaikan dengan Cuaca
Untuk lapangan outdoor, periksa kondisi cuaca sebelum booking. Lapangan indoor kami tersedia untuk segala cuaca.

Dengan mengikuti tips di atas, pengalaman bermain tenis Anda akan lebih menyenangkan!',
            'image' => 'img/Berita1.png',
            'is_featured' => true,
        ]);

        Post::create([
            'title' => 'Jadwal Operasional Terbaru Lapangan Tenis',
            'slug' => 'jadwal-operasional-terbaru-lapangan-tenis',
            'author' => 'Untari Safitri Hidayati',
            'excerpt' => 'Informasi terbaru mengenai jam operasional lapangan tenis untuk weekdays dan weekend.',
            'body' => 'Kami informasikan jadwal operasional terbaru untuk lapangan tenis BLUD UPTD PIP2B DAN JASA KONSTRUKSI DISPERKIM:

Jadwal Operasional:
- Senin - Jumat : 08:00 - 22:00 WIB
- Sabtu - Minggu : 07:00 - 23:00 WIB

Harga Sewa:
- Weekdays (Senin - Jumat) : Rp 70.000 / jam
- Weekend (Sabtu - Minggu) : Rp 100.000 / jam

Promo Spesial:
- Diskon 20% untuk booking slot pagi (sebelum jam 12:00)
- Promo berlaku untuk semua hari

Untuk booking dan informasi lebih lanjut, silakan hubungi kami melalui WhatsApp atau datang langsung ke lokasi.',
            'image' => 'img/Berita2.png',
            'is_featured' => true,
        ]);

        Post::create([
            'title' => 'Keunggulan Bermain Tenis untuk Kesehatan',
            'slug' => 'keunggulan-bermain-tenis-untuk-kesehatan',
            'author' => 'Untari Safitri Hidayati',
            'excerpt' => 'Tenis bukan hanya olahraga yang menyenangkan, tetapi juga memiliki banyak manfaat bagi kesehatan tubuh.',
            'body' => 'Tenis adalah salah satu olahraga yang memberikan banyak manfaat bagi kesehatan fisik dan mental. Berikut adalah beberapa keunggulan bermain tenis:

1. Membakar Kalori
Bermain tenis selama satu jam dapat membakar hingga 400-600 kalori, tergantung intensitas permainan.

2. Meningkatkan Kesehatan Jantung
Gerakan aktif di lapangan membantu meningkatkan denyut jantung dan memperkuat sistem kardiovaskular.

3. Melatih Kelincahan dan Refleks
Tenis membutuhkan gerakan cepat dan respons yang tepat, sehingga melatih kelincahan dan refleks tubuh.

4. Mengurangi Stres
Fokus pada bola dan permainan membantu mengalihkan pikiran dari masalah sehari-hari, mengurangi tingkat stres.

5. Meningkatkan Kekuatan Otot
Gerakan memukul, berlari, dan melompat dalam tenis melatih hampir seluruh otot tubuh.

Ayo booking lapangan sekarang dan rasakan manfaatnya!',
            'image' => 'img/Berita3.png',
            'is_featured' => true,
        ]);
    }
}
