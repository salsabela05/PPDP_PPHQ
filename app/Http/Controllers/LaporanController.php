<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    function laporan()  {
        $pembayaran=Pembayaran::orderBy('id','desc')->where('status','dikonfirmasi')->get();
        return view('app.laporan',compact('pembayaran'));
    }

    function cetak()  {
        $pembayaran=Pembayaran::orderBy('id','desc')->where('status','dikonfirmasi')->get();
        return view('app.laporan_cetak',compact('pembayaran'));
    }

    public function export_pdf()
    {
        $pembayaran = Pembayaran::where('status', 'dikonfirmasi')->orderBy('id', 'desc')->get();
        $pdf = Pdf::loadView('app.laporan_pdf', compact('pembayaran'));
        return $pdf->download('laporan_data_santri.pdf');
    }

    function laporan_pembayaran()  {
        $pembayaran=Pembayaran::orderBy('id','desc')->get();
        return view('app.laporan_pembayaran',compact('pembayaran'));
    }

    public function exportPDFPembayaran()
    {
        $pembayaran = \App\Models\Pembayaran::with('formulir')->orderBy('created_at', 'desc')->get();
        $pdf = Pdf::loadView('app.laporan_pembayaran_pdf', compact('pembayaran'));
        return $pdf->download('laporan_pembayaran.pdf');
    }

    function cetak_pembayaran()  {
        $pembayaran=Pembayaran::orderBy('id','desc')->get();
        return view('app.cetak_pembayaran',compact('pembayaran'));
    }
}
