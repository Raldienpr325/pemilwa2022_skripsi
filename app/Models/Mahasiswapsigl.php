<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswapsigl extends Model
{
    protected $table = 'mahasiswapsigls';

    protected $fillable = [
        'name',
        'email',
        'NIM',
        'prodi',
        'pilihan_presma',
        'pilihan_DPM',
    ];
}
