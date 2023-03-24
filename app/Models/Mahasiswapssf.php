<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswapssf extends Model
{
    protected $table = 'mahasiswapssfs';

    protected $fillable = [
        'name',
        'email',
        'NIM',
        'prodi',
        'pilihan_presma',
        'pilihan_DPM',
    ];
}
