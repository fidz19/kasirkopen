<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Kasir;

class ProfileController extends Controller
{
    /**
     * Tampilkan halaman profile
     */
    public function index()
    {
        $kasir = Auth::guard('kasir')->user();
        return view('profile.index', compact('kasir'));
    }

    /**
     * Update username
     */
    public function updateUsername(Request $request)
    {
        $kasir = Auth::guard('kasir')->user();
        
        // Validasi input
        $request->validate([
            'username' => 'required|string|min:3|unique:kasir,username,' . $kasir->id_kasir . ',id_kasir',
        ], [
            'username.required' => 'Username wajib diisi',
            'username.min' => 'Username minimal 3 karakter',
            'username.unique' => 'Username sudah digunakan kasir lain',
        ]);

        // Update username
        $kasir->username = $request->username;
        $kasir->save();

        return redirect()->route('profile.index')
            ->with('success', 'Username berhasil diperbarui!');
    }

    /**
     * Update password
     */
    public function updatePassword(Request $request)
    {
        $kasir = Auth::guard('kasir')->user();
        
        // Validasi input
        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|min:6|confirmed',
        ], [
            'password_lama.required' => 'Password lama wajib diisi',
            'password_baru.required' => 'Password baru wajib diisi',
            'password_baru.min' => 'Password baru minimal 6 karakter',
            'password_baru.confirmed' => 'Konfirmasi password tidak cocok',
        ]);

        // Cek password lama
        if (!Hash::check($request->password_lama, $kasir->password)) {
            return back()->withErrors(['password_lama' => 'Password lama tidak sesuai']);
        }

        // Update password
        $kasir->password = Hash::make($request->password_baru);
        $kasir->save();

        return redirect()->route('profile.index')
            ->with('success', 'Password berhasil diperbarui!');
    }

    /**
     * Update nama kasir
     */
    public function updateNamaKasir(Request $request)
    {
        $kasir = Auth::guard('kasir')->user();
        
        // Validasi input
        $request->validate([
            'nama_kasir' => 'required|string|min:3',
        ], [
            'nama_kasir.required' => 'Nama kasir wajib diisi',
            'nama_kasir.min' => 'Nama kasir minimal 3 karakter',
        ]);

        // Update nama kasir
        $kasir->nama_kasir = $request->nama_kasir;
        $kasir->save();

        return redirect()->route('profile.index')
            ->with('success', 'Nama kasir berhasil diperbarui!');
    }
}

