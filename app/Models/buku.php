<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul_buku',
        'id_kategori',
        'sinopsis',
        'pengarang',
        'penerbit',
        'tahun_terbit',
        'isbn',
        'stok',
        'dipinjam',
        'dibooking',
        'image',
    ];
    public function detail_pinjam()
    {
        return $this->hasMany(detail_pinjam::class);
    }
    public function detail_booking()
    {
        return $this->hasMany(booking_detail::class);
    }
    public function temp()
    {
        return $this->hasMany(temp::class, 'id_buku', 'id');
    }
    public function kategori()
    {
        return $this->belongsTo(kategori::class, 'id_kategori', 'id');
    }
}
