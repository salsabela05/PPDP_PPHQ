<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('formulir', function (Blueprint $table) {
            $table->string('status_formulir')->nullable()->after('surat_perjanjian');
            $table->string('status_info')->nullable()->after('status_formulir');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('formulir', function (Blueprint $table) {
            $table->dropColumn(['status_formulir', 'status_info']);
        });
    }
};
