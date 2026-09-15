<?php
//Menyiapkan struktur fisik laci-laci tabel doctors beserta aturannya di MySQL.//
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration //
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('doctors', function (Blueprint $table) { //Membuat tabel baru bernama doctors di database MySQL.//
            $table->id();

            $table->foreignId('department_id') //untuk mencatat dokter ini masuk di poli/departemen mana.
                ->constrained('departments')  //Kolom ini dikunci agar nilainya harus wajib ada di tabel departments
                ->cascadeOnDelete();  //Jika suatu hari salah satu departemen (misal: "Poli Anak") dihapus dari aplikasi, maka semua dokter yang terhubung dengan Poli Anak tersebut akan otomatis ikut terhapus oleh sistem. Database-mu jadi bersih dari data sampah.

            $table->string('name');  //menampung nama dokter
            $table->string('specialization'); //untuk menampung teks pendek, yaitu nama lengkap dokter dan apa bidang spesialisasinya
            $table->string('photo')->nullable();  //nullable artinya boleh kosong, karena tidak semua dokter punya foto. Jika ada foto, maka akan disimpan di folder storage/app/public/doctors
            $table->text('description')->nullable(); //sama seperti photo, deskripsi dokter juga boleh kosong. Jika ada, maka akan disimpan di kolom ini.

            $table->timestamps();  //Kolom ini otomatis diisi oleh sistem, mencatat kapan data dokter ini dibuat dan terakhir diperbarui.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void 
    {
        Schema::dropIfExists('doctors'); //Jika suatu hari kamu ingin menghapus tabel doctors, maka perintah ini akan menghapus seluruh struktur tabel beserta isinya.
    }
};
