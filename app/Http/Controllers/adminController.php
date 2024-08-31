<?php

namespace App\Http\Controllers;

use App\Models\booking;
use Illuminate\Http\Request;
use App\Models\buku;
use App\Models\kategori;
use App\Models\detail_pinjam;
use App\Models\temp;
use App\Models\booking_detail;
use App\Models\pinjam;
use App\Models\user;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    // View methods
    public function index()
    {
        $user = Auth::user();
        if ($user == null) {
            abort(403, 'Access Denied');
        } else {
            if ($user->role_id == 1) {
                abort(403, 'Access Denied');
            } else {
                $booking = booking::where('status', 'Belum di ambil')->get();
                $user = user::where('role_id', 1)->get();
                $buku_dipinjam = detail_pinjam::whereHas('pinjam', function ($query) {
                    $query->where('status', 'Pinjam');
                })->get();
                $buku_dibooking = booking_detail::whereHas('booking', function ($query) {
                    $query->where('status', 'Belum di ambil');
                })->get();
                $data = [
                    'title' => 'Dashboard',
                    'booking' => $booking,
                    'jumlah_user' => $user->count(),
                    'jumlah_buku' => buku::sum('stok'),
                    'jumlah_buku_dipinjam' => $buku_dipinjam->count(),
                    'jumlah_buku_dibooking' => $buku_dibooking->count(),
                    'nama' => 'admin'
                ];
                return view('admin.dasboard', $data);
            }
        }
    }
    public function data_booking()
    {
        $user = Auth::user();
        if ($user == null) {
            abort(403, 'Access Denied');
        } else {
            if ($user->role_id == 1) {
                abort(403, 'Access Denied');
            } else {
                $booking = booking::where('status', 'Belum di ambil')->get();
                $data = [
                    'title' => 'Data Booking',
                    'booking' => $booking,
                    'nama' => 'admin'
                ];
                return view('admin.data-booking', $data);
            }
        }
    }
    public function data_peminjaman()
    {
        $user = Auth::user();
        if ($user == null) {
            abort(403, 'Access Denied');
        } else {
            if ($user->role_id == 1) {
                abort(403, 'Access Denied');
            } else {
                $peminjaman = pinjam::where('status', 'Pinjam')->get();
                $data = [
                    'title' => 'Data Peminjaman',
                    'peminjaman' => $peminjaman,
                    'nama' => 'admin'
                ];
                return view('admin.data-peminjaman', $data);
            }
        }
    }
    public function data_buku()
    {
        $user = Auth::user();
        if ($user == null) {
            abort(403, 'Access Denied');
        } else {
            if ($user->role_id == 1) {
                abort(403, 'Access Denied');
            } else {
                $data = [
                    'title' => 'Data Buku',
                    'nama' => 'admin',
                    'kategori' => kategori::all(),
                    'buku' => buku::with('kategori')->get()
                ];
                return view('admin.data-buku', $data);
            }
        }
    }
    public function page_ubah_buku($id)
    {
        $user = Auth::user();
        if ($user == null) {
            abort(403, 'Access Denied');
        } else {
            if ($user->role_id == 1) {
                abort(403, 'Access Denied');
            } else {
                $data = [
                    'title' => 'Data Buku',
                    'nama' => 'admin',
                    'kategori' => kategori::all(),
                    'buku' => buku::findOrFail($id)
                ];
                return view('admin.ubah-buku', $data);
            }
        }
    }
    public function data_kategori()
    {
        $user = Auth::user();
        if ($user == null) {
            abort(403, 'Access Denied');
        } else {
            if ($user->role_id == 1) {
                abort(403, 'Access Denied');
            } else {
                $data = [
                    'title' => 'Data Kategori',
                    'nama' => 'admin',
                    'data' => kategori::all()
                ];
                return view('admin.data-kategori', $data);
            }
        }
    }
    public function data_anggota()
    {
        $user = Auth::user();
        if ($user == null) {
            abort(403, 'Access Denied');
        } else {
            if ($user->role_id == 1) {
                abort(403, 'Access Denied');
            } else {
                $data = [
                    'title' => 'Data anggota',
                    'nama' => 'admin',
                    'anggota' => user::where('role_id', 1)->get()
                ];
                return view('admin.data-anggota', $data);
            }
        }
    }
    public function data_admin()
    {
        $user = Auth::user();
        if ($user == null) {
            abort(403, 'Access Denied');
        } else {
            if ($user->role_id == 3) {
                abort(403, 'Access Denied');
                $data = [
                    'title' => 'Data Admin',
                    'nama' => 'admin',
                    'admin' => user::where('role_id', 2)->get()
                ];
                return view('admin.data-admin', $data);
            } else {
                abort(403, 'Access Denied');
            }
        }
    }
    public function laporan_peminjaman()
    {
        $user = Auth::user();
        if ($user == null) {
            abort(403, 'Access Denied');
        } else {
            if ($user->role_id == 1) {
                abort(403, 'Access Denied');
            } else {
                $data = [
                    'title' => 'Laporan Data Peminjaman',
                    'nama' => 'admin',
                    'peminjaman' => pinjam::all(),
                ];
                return view('admin.laporan-peminjaman', $data);
            }
        }
    }
    public function laporan_buku()
    {
        $user = Auth::user();
        if ($user == null) {
            abort(403, 'Access Denied');
        } else {
            if ($user->role_id == 1) {
                abort(403, 'Access Denied');
            } else {
                $data = [
                    'title' => 'Laporan Data Buku',
                    'nama' => 'admin',
                    'buku' => buku::all()
                ];
                return view('admin.laporan-buku', $data);
            }
        }
    }
    public function laporan_anggota()
    {
        $user = Auth::user();
        if ($user == null) {
            abort(403, 'Access Denied');
        } else {
            if ($user->role_id == 1) {
                abort(403, 'Access Denied');
            } else {
                $data = [
                    'title' => 'Laporan Data anggota',
                    'nama' => 'admin',
                    'anggota' => user::where('role_id', 1)->get()
                ];
                return view('admin.laporan-anggota', $data);
            }
        }
    }


    // backend methods

    public function tambah_admin(Request $request)
    {

        $request->validate([
            'foto_admin' => 'required|image|mimes:jpg,png,jpeg|max:10240',
            'nama_admin' => 'required|string|max:255',
            'alamat_admin' => 'required|string|max:255',
            'email_admin' => 'required|email|unique:users,email|max:255',
            'password_admin' => 'required|string|min:8|confirmed',
        ]);

        $file = $request->file('foto_admin');
        $path_image = $file->store('user_image', 'public');

        user::create([
            'nama' => $request->input('nama_admin'),
            'alamat' => $request->input('alamat_admin'),
            'email' => $request->input('email_admin'),
            'password' => Hash::make($request->input('password_admin')),
            'image' => $path_image,
            'role_id' => 2,
            'is_active' => 1
        ]);

        return redirect('/data-admin');
    }

    public function hapus_admin($id)
    {
        $user = user::findOrFail($id);
        $namaUser = $user->nama;
        $user->delete();
        return redirect('/data-buku')->with('pesan', ' berhasil menghapus buku dengan judul ' . $namaUser);
    }

    public function cetak_laporan_anggota()
    {
        $data = [
            'anggota' => user::where('role_id', 1)->get()
        ];

        $pdf = Pdf::loadView('laporan.anggota', $data);


        return $pdf->download('laporan_anggota.pdf');
    }

    public function cetak_laporan_buku()
    {
        $data = [
            'buku' => buku::all()
        ];

        $pdf = Pdf::loadView('laporan.buku', $data);

        return $pdf->download('laporan_buku.pdf');
    }

    public function cetak_laporan_peminjaman()
    {
        $data = [
            'peminjaman' => pinjam::all(),
        ];

        $pdf = Pdf::loadView('laporan.peminjaman', $data);
        return $pdf->download('laporan_peminjaman.pdf');
    }
}
