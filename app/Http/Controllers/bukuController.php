<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;



class bukuController extends Controller
{
    public function tambah_buku(Request $request)
    {

        $request->validate([
            'judul' => 'required',
            'id_kategori' => 'required',
            'sinopsis' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'isbn' => 'required',
            'stok' => 'required|numeric|min:1',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:10240'
        ], [
            'judul.required' => 'Judul buku tidak boleh kosong!!',
            'id_kategori.required' => 'Tentukan kategori tidak boleh kosong!!',
            'sinopsis.required' => 'Isi sinopsis buku setidaknya 1 paragraf!!',
            'pengarang.required' => 'Pengarang tidak boleh kosong!!',
            'penerbit.required' => 'Penerbit tidak boleh kosong!!',
            'tahun_terbit.required' => 'Tentukan tahun terbit tidak boleh kosong!!',
            'isbn.required' => 'ISBN tidak boleh kosong!!',
            'stok.required' => 'Stok tidak boleh kosong!!',
            'stok.numeric' => 'Stok hanya bisa di isi oleh angka!!',
            'stok.min' => 'Stok minimal 1',
            'image.required' => 'Foto wajib di isi!!',
            'image.image' => 'File wajib berupa gambar',
            'image.mimes' => 'File gambar hanya di dukung format .jpg , .png , .jpeg',
            'image.max' => 'Ukuran file maksimal 10MB',
        ]);

        $file = $request->file('image');
        $path_image = $file->store('image_buku', 'public');

        // Simpan data ke database
        buku::create([
            'judul_buku' => $request->input('judul'),
            'id_kategori' => $request->input('id_kategori'),
            'sinopsis' => $request->input('sinopsis'),
            'pengarang' => $request->input('pengarang'),
            'penerbit' => $request->input('penerbit'),
            'tahun_terbit' => $request->input('tahun_terbit'),
            'isbn' => $request->input('isbn'),
            'stok' => $request->input('stok'),
            'image' => $path_image,
            'dipinjam' => 0,
            'dibooking' => 0,
        ]);

        return redirect('/data-buku')->with('pesan', $request->input('judul') . ' berhasil di tambahkan kedalam daftar buku!');
    }
    public function update_buku($id, Request $request)
    {
        $buku = Buku::find($id);
        $file = $request->file('image');
        if ($file) {
            $path_image = $file->store('image_buku', 'public');
        } else {
            $path_image = $request->input('old_image');
        }
        $data = [
            'judul_buku' => $request->input('judul_buku'),
            'id_kategori' => $request->input('id_kategori'),
            'sinopsis' => $request->input('sinopsis'),
            'pengarang' => $request->input('pengarang'),
            'penerbit' => $request->input('penerbit'),
            'tahun_terbit' => $request->input('tahun_terbit'),
            'isbn' => $request->input('isbn'),
            'stok' => $request->input('stok'),
            'image' => $path_image,
            'dipinjam' => 0,
            'dibooking' => 0,
        ];
        $buku->update($data);
        return redirect('/admin-ubahBuku/' . $id);
    }
    public function hapus_buku($id)
    {
        $buku = buku::findOrFail($id);
        $namaBuku = $buku->judul_buku;
        $buku->delete();
        return redirect('/data-buku')->with('pesan', ' berhasil menghapus buku dengan judul ' . $namaBuku);
    }

    
}
