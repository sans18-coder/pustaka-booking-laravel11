<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booking;
use App\Models\detail_pinjam;
use App\Models\temp;
use App\Models\booking_detail;
use App\Models\pinjam;
use App\Models\user;
use App\Models\buku;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class bookingController extends Controller
{
    public function temp($id_buku)
    {

        $user = Auth::user();
        $temps = temp::where('id_user', $user->id)->get();
        $duplicates_temps = temp::where('id_user', $user->id)
            ->where('id_buku', $id_buku)
            ->get();
        $booking = booking::where('id_user', $user->id)
            ->where('batas_ambil', '>=', Carbon::now())
            ->where('status', 'Belum di ambil')
            ->latest()
            ->first();
        if ($booking) {
            return redirect('/')->with('error', 'Buku bookingan sebelumnya belum di ambil!');
        } elseif ($duplicates_temps->count() > 0) {
            return redirect('/')->with('error', 'Tidak Bisa meminjam 2 buku yang sama dalam 1 peminjaman!');
        } elseif ($temps->count() >= 3) {
            return redirect('/')->with('error', 'Maksimal 3 Buku dalam 1 Peminjaman!');
        } else {
            temp::create([
                "id_user" => $user->id,
                "id_buku" => $id_buku
            ]);
            return redirect('/')->with('pesan', 'Buku telah di tambahkan, Silahkan cek dibagian booking buku!');
        }
    }

    public function hapus_temp($id)
    {
        $temp = temp::findOrFail($id);
        $temp->delete();
        return redirect('/detail-booking');
    }

    public function booking()
    {
        $user = Auth::user();

        $temps = temp::where('id_user', $user->id)->get();

        if ($temps->isEmpty()) {
            return redirect('/detail-booking')->with('error', 'Tidak ada buku untuk di-booking.');
        }

        $tglBooking = Carbon::now();
        $batasAmbil = $tglBooking->copy()->addDays(3);

        $booking = booking::create([
            'tgl_booking' => $tglBooking->format('Y-m-d H:i:s'),
            'batas_ambil' => $batasAmbil->format('Y-m-d H:i:s'),
            'id_user' => $user->id,
            'status' => 'Belum di ambil',
        ]);

        foreach ($temps as $temp) {
            booking_detail::create([
                'id_booking' => $booking->id,
                'id_buku' => $temp->id_buku,
            ]);
            $temp->delete();
        }

        return redirect('/detail-booking')->with('success', 'Booking berhasil diselesaikan.');
    }

    public function confirm_booking($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => 'Diambil']);

        $tglPinjam = Carbon::now();
        $batasPengembalian = $tglPinjam->copy()->addDays(10);
        $pinjam = pinjam::create([
            'tgl_pinjam' => $tglPinjam->format('Y-m-d H:i:s'),
            'id_booking' => $id,
            'tgl_kembali' => $batasPengembalian->format('Y-m-d H:i:s'),
            'tgl_Pengembalian' => null,
            'status' => 'Pinjam',
        ]);

        $detail_booking = booking_detail::where('id_booking', $id)->get();
        foreach ($detail_booking as $detail) {
            detail_pinjam::create([
                'id_pinjam' => $pinjam->id,
                'id_buku' => $detail->id_buku,
                'denda' => 0,
            ]);
        }
        return redirect('/dashboard');
    }
}
