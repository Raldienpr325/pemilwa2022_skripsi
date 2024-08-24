<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DpmFikes extends Model
{
    use HasFactory;
    protected $table = "dpm_fikes";
    protected $fillable = ['nourut', 'nama', 'prodi', 'angkatan', 'foto'];
}
