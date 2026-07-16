<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Lapangan;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Dompdf\Dompdf;

class AdminController extends Controller
{
    public function showLogin()
    {
        return view('admin.login', ['title' => 'Login Admin']);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'Email atau password salah',
        ])->onlyInput('email');
    }

    public function dashboard()
    {
        $now = Carbon::now();

        $totalBookings = Booking::count();
        $todayBookings = Booking::whereDate('tanggal', $now->format('Y-m-d'))->count();
        $pendingBookings = Booking::where('status', 'pending')->count();
        $confirmedBookings = Booking::where('status', 'confirmed')->count();
        $totalRevenue = Booking::whereIn('status', ['confirmed', 'completed'])->sum('total_harga');

        $recentBookings = Booking::with('lapangan')
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        $bookingsByCourt = Lapangan::withCount(['bookings' => function ($q) {
            $q->where('status', '!=', 'cancelled');
        }])->get();

        $bookings6bulan = Booking::whereIn('status', ['confirmed', 'completed', 'pending'])
            ->where('tanggal', '>=', $now->copy()->subMonths(6)->startOfMonth()->format('Y-m-d'))
            ->get()
            ->groupBy(fn($b) => Carbon::parse($b->tanggal)->format('Y-m'));

        $bookingsByMonth = collect();
        for ($i = 5; $i >= 0; $i--) {
            $bulan = $now->copy()->subMonths($i);
            $key = $bulan->format('Y-m');
            $data = $bookings6bulan->get($key, collect());
            $bookingsByMonth->push((object)[
                'bulan' => $bulan->format('m'),
                'tahun' => $bulan->format('Y'),
                'total' => $data->count(),
                'revenue' => $data->sum('total_harga'),
            ]);
        }

        return view('admin.dashboard', [
            'title' => 'Dashboard Admin',
            'totalBookings' => $totalBookings,
            'todayBookings' => $todayBookings,
            'pendingBookings' => $pendingBookings,
            'confirmedBookings' => $confirmedBookings,
            'totalRevenue' => $totalRevenue,
            'recentBookings' => $recentBookings,
            'bookingsByCourt' => $bookingsByCourt,
            'bookingsByMonth' => $bookingsByMonth,
        ]);
    }

    public function bookings(Request $request)
    {
        $query = Booking::with('lapangan')->orderBy('created_at', 'desc');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('payment_status')) {
            $query->where('payment_status', $request->payment_status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('id', $search)
                    ->orWhere('nama', 'like', "%$search%")
                    ->orWhere('no_hp', 'like', "%$search%");
            });
        }

        $bookings = $query->paginate(15);

        return view('admin.bookings', [
            'title' => 'Data Booking',
            'bookings' => $bookings,
        ]);
    }

    public function updateStatus(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled,completed',
        ]);

        $booking->update(['status' => $request->status]);

        return back()->with('success', 'Status booking berhasil diperbarui');
    }

    public function updatePayment(Request $request, Booking $booking)
    {
        $request->validate([
            'payment_status' => 'required|in:unpaid,waiting_payment,paid',
        ]);

        $booking->update(['payment_status' => $request->payment_status]);

        return back()->with('success', 'Status pembayaran berhasil diperbarui');
    }

    public function postsIndex()
    {
        $posts = Post::latest()->paginate(10);
        return view('admin.posts.index', ['title' => 'Kelola Artikel', 'posts' => $posts]);
    }

    public function postsCreate()
    {
        return view('admin.posts.form', ['title' => 'Tambah Artikel', 'post' => null]);
    }

    public function postsStore(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'body' => 'required|string',
            'is_featured' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $slug = Str::slug($validated['title']);
        $original = $slug;
        $counter = 1;
        while (Post::where('slug', $slug)->exists()) {
            $slug = $original . '-' . $counter++;
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'berita_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img'), $filename);
            $imagePath = 'img/' . $filename;
        }

        Post::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'author' => $validated['author'],
            'excerpt' => $validated['excerpt'] ?? Str::limit(strip_tags($validated['body']), 150),
            'body' => $validated['body'],
            'image' => $imagePath,
            'is_featured' => $request->boolean('is_featured'),
        ]);

        return redirect()->route('admin.posts')->with('success', 'Artikel berhasil ditambahkan');
    }

    public function postsEdit(Post $post)
    {
        return view('admin.posts.form', ['title' => 'Edit Artikel', 'post' => $post]);
    }

    public function postsUpdate(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'body' => 'required|string',
            'is_featured' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $slug = Str::slug($validated['title']);
        $original = $slug;
        $counter = 1;
        while (Post::where('slug', $slug)->where('id', '!=', $post->id)->exists()) {
            $slug = $original . '-' . $counter++;
        }

        $data = [
            'title' => $validated['title'],
            'slug' => $slug,
            'author' => $validated['author'],
            'excerpt' => $validated['excerpt'] ?? Str::limit(strip_tags($validated['body']), 150),
            'body' => $validated['body'],
            'is_featured' => $request->boolean('is_featured'),
        ];

        if ($request->hasFile('image')) {
            if ($post->image && file_exists(public_path($post->image))) {
                @unlink(public_path($post->image));
            }
            $file = $request->file('image');
            $filename = 'berita_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img'), $filename);
            $data['image'] = 'img/' . $filename;
        }

        $post->update($data);

        return redirect()->route('admin.posts')->with('success', 'Artikel berhasil diperbarui');
    }

    public function postsDestroy(Post $post)
    {
        if ($post->image && file_exists(public_path($post->image))) {
            @unlink(public_path($post->image));
        }
        $post->delete();

        return back()->with('success', 'Artikel berhasil dihapus');
    }

    public function laporanPdf()
    {
        $now = Carbon::now();

        $totalBookings = Booking::count();
        $todayBookings = Booking::whereDate('tanggal', $now->format('Y-m-d'))->count();
        $pendingBookings = Booking::where('status', 'pending')->count();
        $confirmedBookings = Booking::where('status', 'confirmed')->count();
        $completedBookings = Booking::where('status', 'completed')->count();
        $cancelledBookings = Booking::where('status', 'cancelled')->count();
        $totalRevenue = Booking::whereIn('status', ['confirmed', 'completed'])->sum('total_harga');
        $paidRevenue = Booking::where('payment_status', 'paid')->sum('total_harga');

        $recentBookings = Booking::with('lapangan')
            ->orderBy('created_at', 'desc')
            ->take(20)
            ->get();

        $bookingsByCourt = Lapangan::withCount(['bookings' => function ($q) {
            $q->where('status', '!=', 'cancelled');
        }])->get();

        $bookings6bulan = Booking::whereIn('status', ['confirmed', 'completed', 'pending'])
            ->where('tanggal', '>=', $now->copy()->subMonths(6)->startOfMonth()->format('Y-m-d'))
            ->get()
            ->groupBy(fn($b) => Carbon::parse($b->tanggal)->format('Y-m'));

        $bookingsByMonth = collect();
        for ($i = 5; $i >= 0; $i--) {
            $bulan = $now->copy()->subMonths($i);
            $key = $bulan->format('Y-m');
            $data = $bookings6bulan->get($key, collect());
            $bookingsByMonth->push((object)[
                'bulan' => $bulan->format('m'),
                'tahun' => $bulan->format('Y'),
                'total' => $data->count(),
                'revenue' => $data->sum('total_harga'),
            ]);
        }

        $monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

        $html = view('admin.laporan-pdf', compact(
            'totalBookings', 'todayBookings', 'pendingBookings', 'confirmedBookings',
            'completedBookings', 'cancelledBookings', 'totalRevenue', 'paidRevenue',
            'recentBookings', 'bookingsByCourt', 'bookingsByMonth', 'monthNames', 'now'
        ))->render();

        $dompdf = new Dompdf;
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        return response($dompdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="laporan-booking-' . $now->format('Y-m-d') . '.pdf"',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
