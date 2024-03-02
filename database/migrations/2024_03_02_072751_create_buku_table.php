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
            $table->string('penerbit', 100);
            $table->string('kode_kategori')->index(); //fk
            $table->string('kode_penulis')->index();  //fk
            $table->string('kode_rak')->index(); //fk
            $table->integer('stok');
            $table->timestamps();

            $table->foreign('kode_kategori')->references('id_kategori')->on('kategori');
            $table->foreign('kode_penulis')->references('id_penulis')->on('penulis');
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
