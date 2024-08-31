<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategori;

class kategoriController extends Controller
{
    public function tambah_kategori(Request $request)
    {
        $request->validate([
            'kategori' => 'required|max:40',
        ], [
            'kategori.required' => 'Kolom kategori harus diisi.',
            'kategori.max' => 'Kolom kategori tidak boleh lebih dari 40 karakter.'
        ]);

        // Simpan data ke database
        kategori::create([
            'kategori' => $request->input('kategori')
        ]);

        return redirect('/data-kategori')->with('success', $request->input('kategori') . ' berhasil di tambahkan kedalam kategori!');
    }
    
    public function hapus_kategori($id)
    {
        // Temukan buku berdasarkan ID
        $kategori = kategori::findOrFail($id);
        $namaKategori = $kategori->kategori;
        // Hapus buku
        $kategori->delete();

        // Redirect dengan pesan sukses
        return redirect('/data-kategori')->with('success', ' berhasil menghapus kategori' . $namaKategori . '!');
    }
}
