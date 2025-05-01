<?php

namespace App\Http\Controllers;

use App\Models\Formulir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormulirController extends Controller
{
    function formulir()  {
        $formulir=Formulir::where("user_id", Auth::user()->id)->first();
        return view('app/formulir', compact('formulir'));
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
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto', 'public');
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
