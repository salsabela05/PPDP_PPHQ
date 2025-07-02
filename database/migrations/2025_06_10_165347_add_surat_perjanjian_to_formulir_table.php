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
        // database/migrations/xxxx_xx_xx_add_surat_perjanjian_to_formulir_table.php
        Schema::table('formulir', function (Blueprint $table) {
            //$table->string('surat_perjanjian')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('formulir', function (Blueprint $table) {
            //
        });
    }
};
