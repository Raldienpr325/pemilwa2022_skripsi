<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DpmFK extends Model
{
    use HasFactory;
    protected $table = "dpm_fk";
    protected $fillable = ['nourut', 'nama', 'prodi', 'angkatan', 'foto'];
}