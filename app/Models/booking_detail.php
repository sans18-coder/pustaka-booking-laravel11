<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_booking',
        'id_buku',
    ];
    public function booking()
    {
        return $this->belongsTo(booking::class, 'id_booking', 'id');
    }
    public function buku()
    {
        return $this->belongsTo(buku::class, 'id_buku', 'id');
    }
}
