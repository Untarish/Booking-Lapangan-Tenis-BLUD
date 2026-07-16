<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lapangan extends Model
{
    protected $table = 'lapangan';

    protected $fillable = [
        'nama_lapangan',
        'foto',
        'deskripsi',
        'harga_weekday',
        'harga_weekend',
        'is_active',
    ];

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function getHargaForDay(string $day): int
    {
        $weekendDays = ['Saturday', 'Sunday'];
        return in_array($day, $weekendDays) ? $this->harga_weekend : $this->harga_weekday;
    }
}
