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
        Schema::create('kamars', function (Blueprint $table) {
            $table->id();
            $table->enum('tipe_kamar', ['single room', 'double room'])->nullable();
            $table->enum('status_fasilitas', ['lengkap', 'tidak lengkap'])->nullable();
            $table->enum('kondisi_kamar', ['bersih', 'belum bersih'])->nullable();
            $table->enum('status_kamar', ['terisi', 'kosong'])->nullable();
            $table->string('catatan', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_kamars');
    }
};
