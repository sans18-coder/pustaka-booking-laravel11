<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\user;

class authController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = user::where('email', $credentials['email'])->first();
        if ($user) {
            if ($user->is_active) {
                if (Auth::attempt($credentials)) {
                    $user = Auth::user();
                    $data = [
                        'email' => $user->email,
                        'role_id' => $user->role_id,
                        'id_user' => $user->id,
                        'nama' => $user->name,
                    ];
                    session($data);
                    if ($user->role_id == 1) {
                        return redirect('/');
                    } else {
                        return redirect('/dashboard');
                    }
                } else {
                    return back()->withErrors(['password' => 'Password salah!'])->withInput();
                }
            } else {
                return back()->withErrors(['email' => 'User belum diaktifasi!'])->withInput();
            }
        } else {
            return back()->withErrors(['email' => 'Email tidak terdaftar!'])->withInput();
        }
    }

    public function daftar(Request $request)
    {
        // Validasi data menggunakan validate() dari Request
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:3|confirmed',
        ], [
            'required' => 'Field :attribute harus diisi!',
            'email' => 'Format email tidak valid!',
            'unique' => 'Email sudah terdaftar!',
            'confirmed' => 'Konfirmasi password tidak cocok!',
            'min' => 'Password harus terdiri dari minimal :min karakter!',
        ]);

        // Simpan data pengguna
        $data = [
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'email' => $request->input('email'),
            'image' => 'user_image/default.jpg',
            'password' => Hash::make($request->input('password')),
            'role_id' => 1,
            'is_active' => 1,
        ];

        user::create($data);

        return redirect('/')->with('pesan', 'Selamat! Akun anggota anda sudah dibuat.');
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect('/');
    }
}
