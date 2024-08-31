<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_pinjam extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_pinjam',
        'id_buku',
        'denda',
    ];

    public function pinjam()
    {
        return $this->belongsTo(pinjam::class, 'id_pinjam', 'id');
    }
    public function buku()
    {
        return $this->belongsTo(buku::class);
    }
}
