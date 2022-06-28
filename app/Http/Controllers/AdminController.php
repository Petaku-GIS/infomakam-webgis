<?php

namespace App\Http\Controllers;

use App\Models\DaftarHarga;
use App\Models\Makam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $makam = Makam::select('makam.id', 'makam.nama_makam', 'makam.alamat', 'makam.phone_contact', 'makam.description', 'makam.photos')
            ->where('makam.user_id_pengelola', '=', session('id'))
            ->get();
        return view('admin/profilmakam')->with('makam', $makam);
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

    public function ViewTambahProfilMakam()
    {
        return view('admin/tambahprofilmakam');
    }

    public function TambahProfilMakam(Request $request)
    {
        $makam = new Makam();
        $makam->nama_makam = $request->name;
        $makam->alamat = $request->alamat;
        $makam->whatsapp_contact = $request->whatsapp_contact;
        $makam->phone_contact = $request->phone_contact;
        $makam->description = $request->description;

        // save img in storage
        $file = $request->file('photos');
        $fileName = $file->getClientOriginalName();
        // $request->file('photos')->move(public_path('img/makam'), $fileName);
        Storage::disk('public')->put('img/makam/' . $fileName, file_get_contents($file));        
        $makam->photos = $fileName;
        $makam->user_id_pengelola = session('id');
        if ($makam->save()) {
            return redirect('/admin/profil-makam')->with('success', 'Profil Makam Berhasil Ditambahkan');
        }
        return redirect('/admin/profil-makam')->with('error', 'Profil Makam Gagal Ditambahkan');
    }

    public function HapusProfilMakam(Request $request)
    {
        $daftarHarga = DaftarHarga::where('daftar_harga.makam_id', $request->id)->each(function ($item) {
            $item->delete();
        });
        $makam = Makam::find($request->id);
        if ($makam->delete()) {
            return redirect('/admin/profil-makam')->with('success', 'Profil Makam Berhasil Dihapus');
        }
        return redirect('/admin/profil-makam')->with('error', 'Profil Makam Gagal Dihapus');
    }

    public function ViewUbahProfilMakam(Request $request)
    {
        $makam = Makam::find($request->id);
        return view('admin/ubahprofilmakam')->with('makam', $makam);
    }

    public function UbahProfilMakam(Request $request)
    {
        $makam = Makam::find($request->id);
        $makam->nama_makam = $request->name;
        $makam->alamat = $request->alamat;
        $makam->whatsapp_contact = $request->whatsapp_contact;
        $makam->phone_contact = $request->phone_contact;
        $makam->description = $request->description;

        // save img in storage
        $file = $request->file('photos');
        $fileName = $file->getClientOriginalName();
        Storage::disk('public')->put('img/makam/' . $fileName, file_get_contents($file));
        $makam->photos = $fileName;
        if ($makam->save()) {
            return redirect('/admin/profil-makam')->with('success', 'Profil Makam Berhasil Diubah');
        }
        return redirect('/admin/profil-makam')->with('error', 'Profil Makam Gagal Diubah');
    }
}
