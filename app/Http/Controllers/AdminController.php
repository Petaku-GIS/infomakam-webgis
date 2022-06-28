<?php

namespace App\Http\Controllers;

use App\Models\DaftarHarga;
use App\Models\Makam;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function ViewDashboard()
    {
        $daftarHarga = DaftarHarga::select('daftar_harga.id', 'daftar_harga.name', 'daftar_harga.description', 'daftar_harga.harga', 'daftar_harga.ketersediaan')
            ->join('makam', 'makam.id', '=', 'daftar_harga.makam_id')
            ->where('makam.user_id_pengelola', '=', session('id'))
            ->get();

        return view('admin/daftarharga')->with('daftarHarga', $daftarHarga);
    }

    public function ViewProfilMakam()
    {
        return view('admin/profilmakam');
    }

    public function ViewTambahDaftarHarga()
    {
        $makam = Makam::select('makam.id', 'makam.nama_makam')
            ->where('makam.user_id_pengelola', '=', session('id'))
            ->get();
        return view('admin/tambahdaftarharga')->with('makam', $makam);
    }

    public function TambahDaftarHarga(Request $request)
    {
        $daftarHarga = new DaftarHarga();
        $daftarHarga->name = $request->name;
        $daftarHarga->description = $request->description;
        $daftarHarga->harga = $request->harga;
        $daftarHarga->ketersediaan = $request->ketersediaan;
        $daftarHarga->makam_id = $request->makam_id;
        if ($daftarHarga->save()) {
            return redirect('/admin/daftar-harga')->with('success', 'Daftar Harga Berhasil Ditambahkan');
        }
        return redirect('/admin/daftar-harga')->with('error', 'Daftar Harga Gagal Ditambahkan');
    }

    public function HapusDaftarHarga(Request $request)
    {
        $daftarHarga = DaftarHarga::find($request->id);
        if ($daftarHarga->delete()) {
            return redirect('/admin/daftar-harga')->with('success', 'Daftar Harga Berhasil Dihapus');
        }
        return redirect('/admin/daftar-harga')->with('error', 'Daftar Harga Gagal Dihapus');
    }

    public function ViewUbahDaftarHarga(Request $request)
    {
        $makam = Makam::select('makam.id', 'makam.nama_makam')
            ->where('makam.user_id_pengelola', '=', session('id'))
            ->get();
        $daftarHarga = DaftarHarga::find($request->id);
        return view('admin/ubahdaftarharga')->with('makam', $makam)->with('daftarHarga', $daftarHarga);
    }

    public function UbahDaftarHarga(Request $request)
    {
        $daftarHarga = DaftarHarga::find($request->id);
        $daftarHarga->name = $request->name;
        $daftarHarga->description = $request->description;
        $daftarHarga->ketersediaan = $request->ketersediaan;
        $daftarHarga->harga = $request->harga;
        if ($daftarHarga->save()) {
            return redirect('/admin/daftar-harga')->with('success', 'Daftar Harga Berhasil Diubah');
        }
        return redirect('/admin/daftar-harga')->with('error', 'Daftar Harga Gagal Diubah');
    }
}
