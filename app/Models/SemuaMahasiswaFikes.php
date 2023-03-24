<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemuaMahasiswaFikes extends Model
{
    protected $table = 'semua_mahasiswa_fikes';

    protected $fillable = [
        'name',
        'email',
        'NIM',
        'prodi',
    ];
}