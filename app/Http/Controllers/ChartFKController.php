<?php

namespace App\Http\Controllers;

use App\Models\HasilVotingFk;
use App\Repositories\DpmFK\DpmFKRepository;


class ChartFKController extends Controller
{
    protected $dpmFkRepository;

    public function __construct(DpmFKRepository $dpmFkRepository) {
        $this->dpmFkRepository = $dpmFkRepository;
    }
    public function chartPresmaFK()
    {
        $operation = $this->dpmFkRepository->chartPresma();
        return view('admin.kedokteran.presma.chart', compact('operation'));
    }

    public function chartDpmFK()
    {
        $tampung = $this->dpmFkRepository->chartDpm();
        return view('admin.kedokteran.dpm.chart', compact('tampung'));
    }

    public function record()
    {
        $data = HasilVotingFk::with(['presma', 'dpm', 'user'])->get();
        return view('admin.kedokteran.record', compact(['data']));
    }
}
