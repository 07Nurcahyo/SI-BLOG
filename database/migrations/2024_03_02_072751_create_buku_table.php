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
        Schema::create('buku', function (Blueprint $table) {
            $table->id('id_buku');
            $table->string('isbn', 20);
            $table->string('judul_buku', 200);
            $table->year('tahun_terbit');
            $table->string('kode_penerbit')->index(); //fk
            $table->string('kode_kategori')->index(); //fk
            $table->string('penulis');  
            $table->string('kode_rak')->index(); //fk
            $table->integer('stok');
            $table->timestamps();

            $table->foreign('kode_penerbit')->references('id_penerbit')->on('penerbit');
            $table->foreign('kode_kategori')->references('id_kategori')->on('kategori');
            $table->foreign('kode_rak')->references('id_rak')->on('lokasi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
