<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('formulir', function (Blueprint $table) {
            $table->id();
            // IDENTITAS SANTRI
            $table->bigInteger('user_id');
            $table->year('tahun');
            $table->string('nama');
            $table->string('nama_panggilan')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('asal_sekolah')->nullable();
            $table->string('sekolah_saat_ini')->nullable();
            $table->string('nik', 20)->nullable();
            $table->text('alamat')->nullable();
            $table->string('dusun')->nullable();
            $table->string('rt_rw')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('nohp_wali')->nullable();
            $table->string('nohp_santri')->nullable();

            // DATA AYAH
            $table->string('nama_ayah')->nullable();
            $table->string('nik_ayah', 20)->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('penghasilan_ayah')->nullable();

            // DATA IBU
            $table->string('nama_ibu')->nullable();
            $table->string('nik_ibu', 20)->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('penghasilan_ibu')->nullable();

            // DATA WALI
            $table->string('nama_wali')->nullable();
            $table->string('nik_wali', 20)->nullable();
            $table->string('pekerjaan_wali')->nullable();
            $table->string('penghasilan_wali')->nullable();

            // FOTO
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulir');
    }
};
