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
        Schema::create('pengecekan_fasilitas', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal')->nullable();
            $table->UnsignedBigInteger('fasilitas_id');
            $table->integer('jumlah_rusak')->default(0);
            $table->timestamps();
            
            $table->foreign('fasilitas_id')->references('id')->on('fasilitas')
                ->onDelete('cascade')      
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengecekan_fasilitas');
    }
};
