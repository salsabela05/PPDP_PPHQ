<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    public function pembayaran()
    {
        $pembayarans = DB::table('pembayaran')->get();
        return view('app.pembayaran', compact('pembayaran'));
    }

    public function submit(Request $request)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'keterangan' => 'required|string|max:255',
        ]);

        $filePath = $request->file('bukti_pembayaran')->store('bukti', 'public');

        DB::table('pembayaran')->insert([
            'keterangan' => $request->keterangan,
            'bukti' => $filePath,
            'status' => 'menunggu konfirmasi',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/app/pembayaran')->with('success', 'Upload berhasil!');
    }
}

