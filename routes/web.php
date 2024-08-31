<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\authController;
use App\Http\Controllers\bookingController;
use App\Http\Controllers\userController;
use App\Http\Controllers\bukuController;
use App\Http\Controllers\kategoriController;
use App\Models\user;
use Illuminate\Support\Facades\Route;

// route admin control
Route::get('/dashboard', [adminController::class, 'index']);
Route::get('/data-booking', [adminController::class, 'data_booking']);
Route::get('/data-peminjaman', [adminController::class, 'data_peminjaman']);
Route::get('/data-buku', [adminController::class, 'data_buku']);
Route::get('/admin-ubahBuku/{id}', [adminController::class, 'page_ubah_buku']);
Route::get('/data-kategori', [adminController::class, 'data_kategori']);
Route::get('/data-anggota', [adminController::class, 'data_anggota']);
Route::get('/data-admin', [adminController::class, 'data_admin']);
Route::get('/laporan-peminjaman', [adminController::class, 'laporan_peminjaman']);
Route::get('/laporan-buku', [adminController::class, 'laporan_buku']);
Route::get('/laporan-anggota', [adminController::class, 'laporan_anggota']);
Route::post('/tambah-admin', [adminController::class, 'tambah_admin']);
Route::delete('/hapus-admin/{id}', [adminController::class, 'hapus_admin']);
Route::get('/cetak-laporan-anggota', [adminController::class, 'cetak_laporan_anggota']);
Route::get('/cetak-laporan-buku', [adminController::class, 'cetak_laporan_buku']);
Route::get('/cetak-laporan-peminjaman', [adminController::class, 'cetak_laporan_peminjaman']);

//route auth control
Route::get('/login-admin', [authController::class, 'index']);
Route::post('/daftar', [authController::class, 'daftar']);
Route::post('/login-user', [authController::class, 'login']);
Route::get('/logout', [authController::class, 'logout']);

//route kategegori
Route::post('/tambah-kategori', [kategoriController::class, 'tambah_kategori']);
Route::delete('/hapus-kategori/{id}', [kategoriController::class, 'hapus_kategori']);

//route buku
Route::post('/tambah-buku', [bukuController::class, 'tambah_buku']);
Route::delete('/hapus-buku/{id}', [bukuController::class, 'hapus_buku']);
Route::patch('/update-buku/{id}', [bukuController::class, 'update_buku']);

//route user
Route::get('/', [userController::class, 'index']);
Route::get('/detail-buku/{id}', [userController::class, 'detail_buku']);
Route::get('/detail-booking', [userController::class, 'detail_booking']);
Route::get('/user-profile', [userController::class, 'profile']);
Route::get('/ubah-profile', [userController::class, 'ubah_profile']);
Route::patch('/update-profile', [userController::class, 'update_profile']);


//route booking
//temp
Route::post('/temp/{id_buku}', [bookingController::class, 'temp']);
Route::delete('/hapus-temp/{id}', [bookingController::class, 'hapus_temp']);

//booking
Route::post('/booking', [bookingController::class, 'booking']);
Route::patch('/confirm-booking-user/{id}', [bookingController::class, 'confirm_booking']);
