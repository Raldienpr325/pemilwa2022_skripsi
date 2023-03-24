<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresmaFK extends Model
{
    use HasFactory;
    protected $table = "presmafk";
    protected $fillable = ['nourut','nama','prodi','angkatan','foto'];
}
