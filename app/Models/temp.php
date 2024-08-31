<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class temp extends Model
{
    use HasFactory;
    protected $fillable = [
        'tgl_booking',
        'id_user',
        'id_buku',
    ];

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function buku()
    {
        return $this->belongsTo(buku::class, 'id_buku', 'id');
    }
}
