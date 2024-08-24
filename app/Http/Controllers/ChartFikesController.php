<?php

namespace App\Http\Controllers;

use App\Models\HasilVotingFikes;
use Illuminate\Http\Request;
use App\Repositories\DpmFikes\DpmFikesRepository;

class ChartFikesController extends Controller
{

    protected $dpmFikesRepository;
    public function __construct(DpmFikesRepository $dpmFikesRepository) {
        $this->dpmFikesRepository = $dpmFikesRepository;
    }
    public function chartDpmFikes()
    {
        $tampung = $this->dpmFikesRepository->chartDPM();
        return view('admin.fikes.dpm.chart', compact('tampung'));
    }

    public function chartPresmaFikes()
    {
        $tampung = $this->dpmFikesRepository->chartPresma();
        return view('admin.fikes.presma.chart', compact('tampung'));
    }
    public function record()
    {
        $data = HasilVotingFikes::all();
        return view('admin.fikes.record', compact('data'));
    }
}
