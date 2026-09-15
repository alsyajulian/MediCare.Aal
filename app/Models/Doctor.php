<?php

namespace App\Models;    //Menjadi remote kontrol pintar berbentuk objek PHP yang bertugas mengisi, mengambil, dan memanipulasi laci-laci yang sudah dibuat oleh Migration             

use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\Relations\BelongsTo; 
use Illuminate\Database\Eloquent\Relations\HasMany;   

class Doctor extends Model
{
    protected $fillable = [
        'department_id',                  //--> ini itu foreign key dari tabel department
        'name',                           //--> nama dokter  
        'specialization',                 //--> spesialisasi dokter
        'photo',                          //--> foto dokter
        'description',                    //--> deskripsi dokter
    ];

    public function department(): BelongsTo     //--> relationship nya untuk terhubungkanyan data dokter dengan ke 1 department yang dimilikinya
    {
        return $this->belongsTo(Department::class);   //artinya kita sekalian mengambil data departemennya
    }  //karna dokter itu berada di departemen tertentu, maka kita harus mengambil data departemennya juga

    public function schedules(): HasMany        //--> menghubungkan ke tabel doctor_schedules, karna membuat jadwal doctor butuh data dari isi tabel doctor (dokter mana yang mau dijadwalkan) --kenapa HasMany? Karena satu doctor bisa memiliki banyak jadwal.--
    {
        return $this->hasMany(DoctorSchedule::class);   //-> artinya kita sekalian mengambil data jadwalnya
    }   //karna dokter itu memiliki jadwal tertentu, maka kita harus mengambil data jadwalnya juga

    public function registrations(): HasMany    //--> menghubungkan ke tabel registrations, karna pendaftaran butuh data dari isi tabel doctor (mau daftar ke dokter mana)
    {
        return $this->hasMany(Registration::class);   //-> artinya kita sekalian mengambil data pendaftarannya
    }   //karna dokter itu memiliki pendaftaran tertentu, maka kita harus mengambil data pendaftarannya juga
    
}