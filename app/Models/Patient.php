<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
{
    protected $fillable = [
        'name',
        'nik',
        'phone',
        'birth_date',
        'gender',
        'address',
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];

    public function registrations(): HasMany
    {
        return $this->hasMany(Registration::class);
    }
}