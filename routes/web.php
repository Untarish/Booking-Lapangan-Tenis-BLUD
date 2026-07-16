<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    $posts = Post::where('is_featured', true)->latest()->take(3)->get();
    return view('home', [
        'title' => 'BLUD UPTD PIP2B DAN JASA KONSTRUKSI DISPERKIM - BOOKING LAPANGAN TENIS',
        'posts' => $posts,
    ]);
});

Route::get('/posts', function () {
    return view('posts', ['title' => 'Artikel', 'posts' => Post::latest()->paginate(6)]);
});

Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', ['title' => $post->title, 'post' => $post]);
});

Route::get('/booking', [BookingController::class, 'create'])->name('booking.create');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::get('/booking/success/{id}', [BookingController::class, 'success'])->name('booking.success');
Route::get('/booking/available-slots', [BookingController::class, 'availableSlots'])->name('booking.available-slots');
Route::get('/booking/hitung-harga', [BookingController::class, 'hitungHarga'])->name('booking.hitung-harga');
Route::get('/booking/tracking', [BookingController::class, 'tracking'])->name('booking.tracking');
Route::get('/booking/{booking}/download-pdf', [BookingController::class, 'downloadPdf'])->name('booking.download-pdf');
Route::post('/booking/{booking}/confirm-payment', [BookingController::class, 'confirmPayment'])->name('booking.confirm-payment');

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.post');

    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/dashboard/laporan-pdf', [AdminController::class, 'laporanPdf'])->name('admin.dashboard.laporan-pdf');
        Route::get('/bookings', [AdminController::class, 'bookings'])->name('admin.bookings');
        Route::patch('/bookings/{booking}/status', [AdminController::class, 'updateStatus'])->name('admin.bookings.status');
        Route::patch('/bookings/{booking}/payment', [AdminController::class, 'updatePayment'])->name('admin.bookings.payment');
        Route::get('/posts', [AdminController::class, 'postsIndex'])->name('admin.posts');
        Route::get('/posts/create', [AdminController::class, 'postsCreate'])->name('admin.posts.create');
        Route::post('/posts', [AdminController::class, 'postsStore'])->name('admin.posts.store');
        Route::get('/posts/{post:id}/edit', [AdminController::class, 'postsEdit'])->name('admin.posts.edit');
        Route::put('/posts/{post:id}', [AdminController::class, 'postsUpdate'])->name('admin.posts.update');
        Route::delete('/posts/{post:id}', [AdminController::class, 'postsDestroy'])->name('admin.posts.destroy');
        Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    });
});
