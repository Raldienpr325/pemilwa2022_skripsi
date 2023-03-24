<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaFK extends Controller
{
    public function VotePresma()
    {
        return view('mahasiswa.kedokteran.votepresma');
    }
}