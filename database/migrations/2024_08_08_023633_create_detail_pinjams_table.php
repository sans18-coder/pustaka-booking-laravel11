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
        Schema::create('detail_pinjams', function (Blueprint $table) {
            $table->unsignedBigInteger('id_pinjam');
            $table->foreign('id_pinjam')->references('id')->on('pinjams');
            $table->unsignedBigInteger('id_buku');
            $table->foreign('id_buku')->references('id')->on('bukus');
            $table->integer('denda');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pinjams');
    }
};
