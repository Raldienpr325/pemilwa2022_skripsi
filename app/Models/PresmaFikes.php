<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresmaFikes extends Model
{
    use HasFactory;
    protected $table = "presma_fikes";
    protected $fillable = ['nourut', 'nama', 'prodi', 'angkatan', 'foto'];
}