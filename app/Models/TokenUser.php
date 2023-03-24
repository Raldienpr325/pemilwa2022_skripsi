<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokenUser extends Model
{
    protected $table = 'token_users';

    protected $fillable = [
        'name',
        'email',
        'given_name',
        'family_name',
        'hd',
        'NIM',
        'prodi',
        'password',
    ];
}
