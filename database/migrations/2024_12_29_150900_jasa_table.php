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
        Schema::create('tb_jasa', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jasa');
            $table->string('jenis_jasa');
            $table->string('harga_jasa');
            $table->string('waktu_estimasi');
            $table->text('keterangan_jasa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_jasa');
    }
};
