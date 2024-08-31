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
        Schema::create('pinjams', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_pinjam');
            $table->unsignedBigInteger('id_booking');
            $table->foreign('id_booking')->references('id')->on('bookings');
            $table->date('tgl_kembali');
            $table->date('tgl_pengembalian')->nullable();
            $table->enum('status', ['Pinjam', 'Kembali']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjams');
    }
};
