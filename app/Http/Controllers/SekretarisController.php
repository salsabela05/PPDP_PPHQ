<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formulir;

class SekretarisController extends Controller
{
    public function daftarKelas()
    {
        $kelas = Formulir::whereNotNull('hasil_seleksi_tpa')->get()->groupBy('hasil_seleksi_tpa');
        return view('sekretaris.kelas', compact('kelas'));
    }

    public function cetakAbsensi($kelas)
    {
        $santri = \App\Models\Formulir::where('hasil_seleksi_tpa', $kelas)
                    ->orderBy('nama')
                    ->get();

        return view('sekretaris.cetak_absensi', compact('santri', 'kelas'));
    }

}
