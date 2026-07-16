<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Lapangan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class BookingController extends Controller
{
    public function create()
    {
        $lapangan = Lapangan::where('is_active', true)->get();
        return view('booking', [
            'title' => 'Booking Lapangan',
            'lapangan' => $lapangan,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'lapangan_id' => 'required|exists:lapangan,id',
            'tanggal' => 'required|date|after_or_equal:today',
            'jam_mulai' => 'required|date_format:H:i',
            'durasi' => 'required|integer|min:1|max:3',
        ]);

        $lapangan = Lapangan::findOrFail($validated['lapangan_id']);
        $tanggal = Carbon::parse($validated['tanggal']);
        $jamMulai = Carbon::parse($validated['jam_mulai']);
        $durasi = (int) $validated['durasi'];
        $jamSelesai = $jamMulai->copy()->addHours($durasi);
        $hari = $tanggal->format('l');

        $hargaPerJam = $lapangan->getHargaForDay($hari);

        $totalHarga = $hargaPerJam * $durasi;

        $jamPagiDiskon = $jamMulai->hour < 12;
        if ($jamPagiDiskon) {
            $totalHarga = (int) ($totalHarga * 0.8);
        }

        $existingBooking = Booking::where('lapangan_id', $lapangan->id)
            ->where('tanggal', $validated['tanggal'])
            ->where('status', '!=', 'cancelled')
            ->where(function ($query) use ($jamMulai, $jamSelesai) {
                $query->whereBetween('jam_mulai', [$jamMulai->format('H:i'), $jamSelesai->format('H:i')])
                    ->orWhereBetween('jam_selesai', [$jamMulai->format('H:i'), $jamSelesai->format('H:i')])
                    ->orWhere(function ($q) use ($jamMulai, $jamSelesai) {
                        $q->where('jam_mulai', '<=', $jamMulai->format('H:i'))
                            ->where('jam_selesai', '>=', $jamSelesai->format('H:i'));
                    });
            })
            ->exists();

        if ($existingBooking) {
            return back()->withErrors(['jam_mulai' => 'Jam tersebut sudah dibooking. Silakan pilih jam lain.'])->withInput();
        }

        $booking = Booking::create([
            'nama' => $validated['nama'],
            'no_hp' => $validated['no_hp'],
            'email' => $validated['email'],
            'lapangan_id' => $lapangan->id,
            'tanggal' => $validated['tanggal'],
            'jam_mulai' => $jamMulai->format('H:i'),
            'jam_selesai' => $jamSelesai->format('H:i'),
            'durasi' => $durasi,
            'harga_per_jam' => $hargaPerJam,
            'total_harga' => $totalHarga,
            'status' => 'pending',
        ]);

        return redirect()->route('booking.success', $booking->id);
    }

    public function success($id)
    {
        $booking = Booking::with('lapangan')->findOrFail($id);
        return view('booking-success', [
            'title' => 'Booking Berhasil',
            'booking' => $booking,
        ]);
    }

    public function availableSlots(Request $request)
    {
        $request->validate([
            'lapangan_id' => 'required|exists:lapangan,id',
            'tanggal' => 'required|date',
        ]);

        $lapangan = Lapangan::findOrFail($request->lapangan_id);
        $tanggal = Carbon::parse($request->tanggal);
        $hari = $tanggal->format('l');
        $weekendDays = ['Saturday', 'Sunday'];

        $jamBuka = in_array($hari, $weekendDays) ? 7 : 8;
        $jamTutup = in_array($hari, $weekendDays) ? 23 : 22;

        $existingBookings = Booking::where('lapangan_id', $lapangan->id)
            ->where('tanggal', $request->tanggal)
            ->where('status', '!=', 'cancelled')
            ->get();

        $slots = [];
        for ($jam = $jamBuka; $jam < $jamTutup; $jam++) {
            $jamMulai = sprintf('%02d:00', $jam);
            $jamSelesai = sprintf('%02d:00', $jam + 1);

            $isBooked = $existingBookings->contains(function ($booking) use ($jamMulai, $jamSelesai) {
                return ($booking->jam_mulai <= $jamMulai && $booking->jam_selesai > $jamMulai) ||
                       ($booking->jam_mulai < $jamSelesai && $booking->jam_selesai >= $jamSelesai) ||
                       ($booking->jam_mulai >= $jamMulai && $booking->jam_selesai <= $jamSelesai);
            });

            $slots[] = [
                'jam' => $jamMulai,
                'label' => $jamMulai . ' - ' . $jamSelesai . ' WIB',
                'available' => !$isBooked,
            ];
        }

        return response()->json($slots);
    }

    public function confirmPayment(Request $request, Booking $booking)
    {
        $request->validate([
            'nama_pengirim' => 'required|string|max:255',
            'tanggal_transfer' => 'required|date',
        ]);

        $booking->update([
            'payment_status' => 'waiting_payment',
            'nama_pengirim' => $request->nama_pengirim,
            'bank_tujuan' => 'Bank Sumsel Babel',
            'tanggal_transfer' => $request->tanggal_transfer,
            'confirmed_at' => now(),
        ]);

        return redirect()->route('booking.tracking', ['q' => $booking->no_hp])
            ->with('success', 'Konfirmasi pembayaran berhasil dikirim. Admin akan memverifikasi pembayaran Anda.');
    }

    public function tracking(Request $request)
    {
        $booking = null;
        if ($request->filled('q')) {
            $q = trim($request->q);

            if (str_starts_with($q, '#')) {
                $id = ltrim($q, '#');
                $booking = Booking::with('lapangan')->where('id', $id)->first();
            } elseif (is_numeric($q)) {
                $booking = Booking::with('lapangan')->where('id', $q)->first();
                if (!$booking) {
                    $booking = Booking::with('lapangan')->where('no_hp', 'like', "%$q%")->latest()->first();
                }
            } else {
                $booking = Booking::with('lapangan')->where('no_hp', 'like', "%$q%")->latest()->first();
            }

            if (!$booking) {
                return back()->withErrors(['q' => 'Booking tidak ditemukan']);
            }
        }
        return view('booking-tracking', [
            'title' => 'Cek Status Booking',
            'booking' => $booking,
        ]);
    }

    public function hitungHarga(Request $request)
    {
        $request->validate([
            'lapangan_id' => 'required|exists:lapangan,id',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required|date_format:H:i',
            'durasi' => 'required|integer|min:1|max:3',
        ]);

        $lapangan = Lapangan::findOrFail($request->lapangan_id);
        $tanggal = Carbon::parse($request->tanggal);
        $hari = $tanggal->format('l');
        $jamMulai = Carbon::parse($request->jam_mulai);

        $hargaPerJam = $lapangan->getHargaForDay($hari);
        $totalHarga = $hargaPerJam * (int) $request->durasi;

        $diskon = 0;
        if ($jamMulai->hour < 12) {
            $diskon = (int) ($totalHarga * 0.2);
            $totalHarga = $totalHarga - $diskon;
        }

        return response()->json([
            'harga_per_jam' => $hargaPerJam,
            'total_harga' => $totalHarga,
            'diskon' => $diskon,
        ]);
    }

    public function downloadPdf(Booking $booking)
    {
        $booking->load('lapangan');
        $pdf = Pdf::loadView('booking-pdf', compact('booking'));
        return $pdf->download("booking-{$booking->id}.pdf");
    }
}
