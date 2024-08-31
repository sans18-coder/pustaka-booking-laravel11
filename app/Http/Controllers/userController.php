<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\buku;
use App\Models\temp;
use App\Models\booking;
use App\Models\booking_detail;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class userController extends Controller
{
    // view methods
    public function index()
    {
        $buku = Buku::all();

        if (Auth::check()) {
            $user = Auth::user();
            $data = [
                'title' => 'Home',
                'buku' => $buku,
                'user' => $user->nama,
            ];
        } else {
            $data = [
                'title' => 'Home',
                'buku' => $buku,
                'user' => 'Pengunjung',
            ];
        }
        return view('user.home', $data);
    }

    public function detail_buku($id)
    {
        $user = Auth::user();
        $data = [
            'title' => 'Detail Buku',
            'buku' => Buku::findOrFail($id),
            'user' => $user->nama,
        ];
        return view('user.detail-buku', $data);
    }

    public function detail_booking()
    {
        $user = Auth::user();
        $booking = booking::where('id_user', $user->id)
            ->where('batas_ambil', '>=', Carbon::now())
            ->where('status', 'Belum di ambil')
            ->latest()
            ->first();
        $data = [
            'title' => 'Detail Buku',
            'temp' => Temp::where('id_user', $user->id)->get(),
            'user' => $user->nama,
            'booking' => $booking,
        ];

        return view('user.detail-booking', $data);
    }

    public function profile()
    {
        $user = Auth::user();
        $booking = booking::where('id_user', $user->id)->get();
        $bookingId = $booking->pluck('id')->toArray();
        $data = [
            'title' => 'Profile Saya',
            'booking' => booking_detail::where('id_booking', $bookingId)->get(),
            'user' => $user,
        ];
        return view('user.user-profile', $data);
    }

    public function ubah_profile()
    {
        $user = Auth::user();
        $data = [
            'title' => 'Ubah Profile',
            'user' => $user,
        ];
        return view('user.ubah-profile', $data);
    }

    public function update_profile(Request $request)
    {
        $user = Auth::user();
        $update_user = user::findOrFail($user->id);
        $file = $request->file('image');
        if ($file) {
            $path_image = $file->store('user_image', 'public');
        } else {
            $path_image = $request->input('old_image');
        }
        $data = [
            'email' => $request->input('email'),
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'image' => $path_image,
        ];
        $update_user->update($data);
        return redirect('/ubah-profile')->with('pesan', 'Profile telah terupdate!');;
    }
}
