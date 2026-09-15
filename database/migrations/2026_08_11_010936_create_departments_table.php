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
        Schema::create('departments', function (Blueprint $table) {
            $table->id();  //--> membuat kolom id sebagai primary key, auto increment, dan unik
            $table->string('name'); //--> menampung nama departemen, misal: "Poli Anak", "Poli Gigi", dll
            $table->text('description')->nullable(); //--> menampung deskripsi departemen, misal: "Poli Anak adalah departemen yang menang
            $table->string('image')->nullable(); //--> menampung gambar departemen, misal: logo atau foto ruangan departemen, boleh kosong
            $table->timestamps(); //--> biar tau waktu pembuatan dan waktu update data departemen
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments'); //--> jika suatu hari ingin menghapus tabel departments, maka perintah ini akan menghapus seluruh struktur tabel beserta isinya
    }
};
