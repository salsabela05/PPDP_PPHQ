<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formulir;

class KetuaTPAController extends Controller
{
    public function santriDiterima()
    {
        $santriDiterima = Formulir::where('status_seleksi', 'lolos')->get();

        // Debug sementara, tampilkan jumlah data:
        // dd($santriDiterima);

        return view('ketua_tpa.santri_diterima', compact('santriDiterima'));
    }

    public function inputHasilSeleksi(Request $request, $id)
    {
        $request->validate([
            'hasil_seleksi_tpa' => 'required|string|max:255',
        ]);

        $formulir = Formulir::findOrFail($id);

        // Pastikan kolom ini memang ada di database
        $formulir->hasil_seleksi_tpa = $request->input('hasil_seleksi_tpa');
        $formulir->save();

        return back()->with('success', 'Hasil seleksi berhasil disimpan.');
    }
}
