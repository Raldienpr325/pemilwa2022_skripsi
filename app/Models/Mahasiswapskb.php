<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswapskb extends Model
{
    protected $table = 'mahasiswapskbs';

    protected $fillable = [
        'name',
        'email',
        'NIM',
        'prodi',
        'pilihan_presma',
        'pilihan_DPM',
    ];
}
