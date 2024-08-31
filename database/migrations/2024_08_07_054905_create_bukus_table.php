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
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->string('judul_buku', length: 128);
            $table->unsignedBigInteger('id_kategori');
            $table->foreign('id_kategori')->references('id')->on('kategoris');
            $table->text('sinopsis');
            $table->string('pengarang', length: 64);
            $table->string('penerbit', length: 64);
            $table->year('tahun_terbit');
            $table->string('isbn', length: 64);
            $table->integer('stok');
            $table->integer('dipinjam');
            $table->integer('dibooking');
            $table->string('image', length: 256);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
