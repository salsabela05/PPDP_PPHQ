<?php

namespace App\Http\Controllers;

use App\Models\Formulir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pembayaran;

class FormulirController extends Controller
{
    
    public function formulir()
    {
        $userId = Auth::user()->id;
        $formulir = Formulir::where('user_id', $userId)->first();
        $pembayaran = Pembayaran::where('user_id', $userId)->first();
        return view('app.formulir', compact('formulir', 'pembayaran'));
    }

    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'jenjang' => 'required|in:umum,tahfidz',
            // validasi lainnya...
        ]);

        // Simpan ke database
        $formulir = new Formulir();
        $formulir->nama = $request->nama;
        $formulir->jenjang = $request->jenjang; // ✅ baris penting
        // simpan input lainnya...
        $formulir->save();

        return redirect()->back()->with('success', 'Formulir berhasil disimpan!');
    }

    public function uploadSurat(Request $request)
    {
        // Validasi file
        $request->validate([
            'surat_perjanjian' => 'required|mimes:pdf|max:2048',
        ]);

        // Ambil data formulir berdasarkan user_id
        $formulir = Formulir::where('user_id', auth()->id())->first();

        if (!$formulir) {
            return redirect()->back()->with('error', 'Data formulir tidak ditemukan.');
        }

        // Simpan file ke storage/app/public/surat_perjanjian
        if ($request->hasFile('surat_perjanjian')) {
            $path = $request->file('surat_perjanjian')->store('surat_perjanjian', 'public');
            $formulir->surat_perjanjian = $path;
            $formulir->save();
        }

        return redirect()->back()->with('success', 'Surat perjanjian berhasil diunggah.');
    }

    public function daftar_formulir()
    {
        $formulir = \App\Models\Formulir::orderBy('created_at', 'desc')->get();
        return view('app.daftar_formulir', compact('formulir'));
    }

    public function verifikasi($id, $status)
    {
        $formulir = Formulir::findOrFail($id);
        $formulir->status_formulir = $status;
        $formulir->status_info = null;
        $formulir->status_seleksi = 'lolos';
        $formulir->save();
        return back()->with('success', 'Formulir berhasil diverifikasi.');
    }

    public function tolak(Request $request, $id)
    {
        $request->validate([
            'status_info' => 'required|string|max:255'
        ]);

        $formulir = Formulir::findOrFail($id);
        $formulir->status_formulir = 'ditolak';
        $formulir->status_info = $request->status_info;
        $formulir->save();

        return back()->with('success', 'Formulir berhasil ditolak.');
    }


    function formulir_submit(Request $request)  {
        $data = $request->validate([
            'nama' => 'required',
            'nama_panggilan' => 'required',
            'tempat_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'asal_sekolah' => 'required',
            'sekolah_saat_ini' => 'required',
            'nik' => 'required',
            'alamat' => 'required',
            'dusun' => 'nullable',
            'rt_rw' => 'nullable',
            'kelurahan' => 'nullable',
            'kode_pos' => 'nullable',
            'kecamatan' => 'nullable',
            'kabupaten' => 'nullable',
            'provinsi' => 'nullable',
            'nohp_wali' => 'nullable',
            'nohp_santri' => 'nullable',
            'nama_ayah' => 'required',
            'nik_ayah' => 'nullable',
            'pekerjaan_ayah' => 'nullable',
            'penghasilan_ayah' => 'nullable',
            'nama_ibu' => 'required',
            'nik_ibu' => 'nullable',
            'pekerjaan_ibu' => 'nullable',
            'penghasilan_ibu' => 'nullable',
            'nama_wali' => 'nullable',
            'nik_wali' => 'nullable',
            'pekerjaan_wali' => 'nullable',
            'penghasilan_wali' => 'nullable',
            'jenjang' => 'required',
            'link_berkas' => ['required', 'url', 'starts_with:https://', 'regex:/^https:\/\/drive\.google\.com/'],
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto', 'public');
        }
        if ($request->hasFile('surat_perjanjian')) {
            $data['surat_perjanjian'] = $request->file('surat_perjanjian')->store('surat_perjanjian', 'public');
        }


        $data['user_id']=Auth::user()->id;
        $data['tahun']=date('Y');

        $formulir=Formulir::where("user_id", Auth::user()->id)->first();
        if (!$formulir) {
            Formulir::create($data);
        }else{
            $formulir->update($data);
        }

        return redirect()->back();
    }   

}
