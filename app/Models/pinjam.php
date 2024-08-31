<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pinjam extends Model
{
    use HasFactory;
    protected $fillable = [
        'tgl_pinjam',
        'id_booking',
        'tgl_kembali',
        'tgl_pengembalian',
        'status',
    ];

    public function booking()
    {
        return $this->belongsTo(booking::class, 'id_booking', 'id');
    }
    public function detail()
    {
        return $this->hasMany(detail_pinjam::class, 'id_pinjam', 'id');
    }
}
