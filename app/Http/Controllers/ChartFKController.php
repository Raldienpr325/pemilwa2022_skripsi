<?php

namespace App\Http\Controllers;

use App\Models\HasilVotingFk;


class ChartFKController extends Controller
{
    public function chartPresmaFK()
    {
           $master = HasilVotingFk::with('presma')
            ->whereNotNull('presma_id');
        $data = clone $master;
        $data = $data
            ->select('presma_id')
            ->get();
        $test = clone $data;
       $test = $test
            ->groupBy('presma_id')
            ->map(function ($item) {
                return $item->count('DISTINCT(presma_id)');
            })
            ->toArray();
     
        $tampung = [];
        foreach ($test as $item => $value) {
            $a['name'] = $item;
            $a['y'] = $value;
            array_push($tampung, $a);
        }
        return view('admin.kedokteran.presma.chart', compact(['data', 'tampung']));
    }

    public function chartDpmFK()
    {
        $master = HasilVotingFk::with('dpm')
            ->whereNotNull('dpm_id');
        $data = clone $master;
        $data = $data
            ->select('dpm_id')
            ->get();
        $test = clone $data;
        $test = $test
            ->groupBy('dpm_id')
            ->map(function ($item) {
                return $item->count('DISTINCT(dpm_id)');
            })
            ->toArray();

        $tampung = [];
        foreach ($test as $item => $value) {
            $a['name'] = $item;
            $a['y'] = $value;
            array_push($tampung, $a);
        }
        return view('admin.kedokteran.dpm.chart', compact('tampung'));
    }

    public function record()
    {
        $data = HasilVotingFk::with(['presma', 'dpm', 'user'])->get();
        return view('admin.kedokteran.record', compact(['data']));
    }
}