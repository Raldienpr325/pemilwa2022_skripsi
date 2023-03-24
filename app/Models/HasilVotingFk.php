<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilVotingFk extends Model
{
    use HasFactory;
    protected $table = 'hasil_voting_fk';
    protected $fillable = [
        'users_id',
        'dpm_id',
        'presma_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function dpm()
    {
        return $this->belongsTo(DpmFK::class, 'dpm_id');
    }

    public function presma()
    {
        return $this->belongsTo(PresmaFK::class, 'presma_id');
    }
}