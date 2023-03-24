<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswapsikl extends Model
{
    protected $table = 'mahasiswapsikls';

    protected $fillable = [
        'name',
        'email',
        'NIM',
        'prodi',
        'pilihan_presma',
        'pilihan_DPM',
    ];
}
