<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('nama_pengirim')->nullable()->after('payment_status');
            $table->string('bank_tujuan')->nullable()->after('nama_pengirim');
            $table->date('tanggal_transfer')->nullable()->after('bank_tujuan');
            $table->timestamp('confirmed_at')->nullable()->after('tanggal_transfer');
        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn(['nama_pengirim', 'bank_tujuan', 'tanggal_transfer', 'confirmed_at']);
        });
    }
};
