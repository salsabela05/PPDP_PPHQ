<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formulir;     // ← ganti Santri dengan Formulir
use App\Models\Pembayaran;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Total semua santri = jumlah semua record di tabel formulir
        $totalSantri      = Formulir::count();

        // Santri baru contoh: yang daftar dalam 7 hari terakhir
        $santriBaru       = Formulir::whereDate('created_at', '>=', now()->subDays(7))->count();

        // Data belum lengkap: misal alamat atau no_hp kosong
        $dataBelumLengkap = Formulir::whereNull('alamat')
                                   ->orWhereNull('nohp_wali')
                                   ->orWhereNull('foto')
                                   ->count();

        // Belum bayar: status di tabel pembayaran selain "dikonfirmasi"
        $belumBayar       = Pembayaran::where('status', '!=', 'dikonfirmasi')->count();

        return view('app.dashboard', compact(
            'totalSantri',
            'santriBaru',
            'dataBelumLengkap',
            'belumBayar'
        ));
    }

    function manajemen_akun() {
        $user=User::orderBy('level','asc')->get();
        return view('app.manajemen_akun',compact('user'));
    }
    function manajemen_akun_reset(Request $request) {
        $id=$request->id;
        $user=User::find($id);
        $user->password=bcrypt('12345678');
        $user->update();
        return redirect()->back()->with('success','akun berhasil direset');
    }
}
