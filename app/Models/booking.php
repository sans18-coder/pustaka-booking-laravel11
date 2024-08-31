<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'tgl_booking',
        'batas_ambil',
        'id_user',
        'status',
    ];

    public function detail_booking()
    {
        return $this->hasMany(booking_detail::class);
    }
    public function pinjam()
    {
        return $this->hasOne(pinjam::class);
    }
    public function user()
    {
        return $this->belongsTo(user::class, 'id_user', 'id');
    }
}
