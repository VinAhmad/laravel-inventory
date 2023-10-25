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
        Schema::create('stok_barang', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 7);
            $table->integer('stok_masuk')->nullable();
            $table->integer('stok_keluar')->nullable();
            $table->integer('stok_sisa')->nullable();
            $table->integer('stok_minimal')->nullable();
            $table->dateTime('dibuat_kapan')->nullable();
            $table->integer('dibuat_oleh')->nullable();
            $table->dateTime('diperbarui_kapan')->nullable();
            $table->integer('diperbarui_oleh')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stok_barang');
    }
};
