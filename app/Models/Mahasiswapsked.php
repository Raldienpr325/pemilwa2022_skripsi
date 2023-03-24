<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswapsked extends Model
{
    use HasFactory;

    protected $table = 'mahasiswapskeds';

    protected $fillable = [
        'name',
        'email',
        'NIM',
        'prodi',
        'pilihan_presma',
        'pilihan_DPM',
    ];
}
