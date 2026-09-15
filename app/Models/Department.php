<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    protected $fillable = [ //fillable itu yng menentukan data yang diperbolehkan untuk diisi ke model
        'name',                 //--> nama departemen (string, max 255 karakter)
        'description',          //--> deskripsi departemen (string)
        'image',                //--> gambar departemen (nullable<enggadajugagpapa>, image)
    ];

    public function doctors(): HasMany //--> menghubungkan ke tabel doctors, karna doctor butuh data departemen untuk mengisi foreign key department_id di tabel doctors (dokter mana yang berada di departemen ini)
    {
        return $this->hasMany(Doctor::class);  //--> artinya kita sekalian mengambil data dokter yang berada di departemen ini
    } //karena departemen itu memiliki dokter tertentu, maka kita harus mengambil data dokternya juga
}