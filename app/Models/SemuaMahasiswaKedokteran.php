<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemuaMahasiswaKedokteran extends Model
{
    protected $table = 'semua_mahasiswa_kedokterans';

    protected $fillable = [
        'name',
        'email',
        'NIM',
        'prodi',
    ];
}