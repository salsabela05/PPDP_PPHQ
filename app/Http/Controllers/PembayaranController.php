<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class PembayaranController extends Controller
{
    public function pembayaran()
    {
        $pembayaran = Auth::user()->pembayaran()->get();
        return view('app.pembayaran', compact('pembayaran'));
    }

    public function pembayaran_submit(Request $request)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'keterangan' => 'required|string|max:255',
        ]);

        $filePath = $request->file('bukti_pembayaran')->store('bukti', 'public');

        $id=Auth::user()->id;
        DB::table('pembayaran')->insert([
            'user_id'=> $id,
            'keterangan' => $request->keterangan,
            'bukti' => $filePath,
            'status' => 'menunggu konfirmasi',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/app/pembayaran')->with('success', 'Upload berhasil!');
    }

    function daftar_pembayaran(){
        $pembayaran=Pembayaran::orderBy('created_at','desc')->get();
        return view('app.daftar_pembayaran', compact('pembayaran'));
    }

    function daftar_pembayaran_konfirmasi($id) {
    $pembayaran = Pembayaran::findOrFail($id);
    $pembayaran->status = "dikonfirmasi";
    $pembayaran->status_info = "Bukti valid";
    $pembayaran->save();

    $filename = 'kwitansi_' . $pembayaran->id . '.pdf';
    $pdfPath = 'kwitansi/' . $filename;

    if (!file_exists(public_path('kwitansi'))) {
        mkdir(public_path('kwitansi'), 0755, true);
    }

    $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.kwitansi', ['pembayaran' => $pembayaran]);
    Storage::disk('public')->put($pdfPath, $pdf->output());

    $pembayaran->kwitansi = $pdfPath;
    $pembayaran->save();

    return redirect()->back()->with('success', 'Pembayaran dikonfirmasi & kwitansi dibuat.');
    }


    function daftar_pembayaran_tolak(Request $request, $id) {
        $pembayaran=Pembayaran::find($id);
        $pembayaran->status="ditolak";
        $pembayaran->status_info=$request->status_info;
        $pembayaran->update();

        return redirect()->back();
    }
    

}