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
        Schema::create('tb_tukang', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('nama_tukang');
            $table->string('no_hp');
            $table->string('email');
            $table->string('geo_lat');
            $table->string('geo_long');
            $table->text('alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_tukang');
    }
};
