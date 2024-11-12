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
        Schema::create('fasilitas', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('nama_fasilitas', 30); 
            $table->unsignedBigInteger('kategori_id');
            $table->integer('stok')->nullable()->default(0);  
            $table->integer('penggunaan')->nullable()->default(0);  
            $table->timestamps();

            $table->foreign('kategori_id')->references('id')->on('kategoris')
                ->onDelete('cascade')      
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fasilitas');
    }
};
