<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    protected $table = 'santri'; // ganti sesuai nama tabel santri di database
    protected $guarded = []; // agar bisa mass-assignment
    protected $fillable = ['nama', 'jenjang', 'status_verifikasi', 'hasil_seleksi_tpa'];

}
