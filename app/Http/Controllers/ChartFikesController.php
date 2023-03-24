<?php

namespace App\Http\Controllers;

use App\Models\HasilVotingFikes;
use Illuminate\Http\Request;

class ChartFikesController extends Controller
{
    public function chartDpmFikes()
    {
        $data = HasilVotingFikes::with('dpm')->get();
        $tampung = [];
        foreach ($data as $value) {
            $name = @$value->presma->nama ?? 'kosong';
            $id_presma = $value->presma_id;
            $hasil = HasilVotingFikes::where('presma_id', $id_presma)->count();
            $a['name'] = $name;
            $a['y'] = $hasil;
            array_push($tampung, $a);
        }
        return view('admin.fikes.dpm.chart', compact('tampung'));
    }

    public function chartPresmaFikes()
    {
        $data = HasilVotingFikes::with('presma')->get();
        $tampung = [];
        foreach ($data as $value) {
            $name = @$value->presma->nama ?? 'kosong';
            $id_presma = $value->presma_id;
            $hasil = HasilVotingFikes::where('presma_id', $id_presma)->count();
            $a['name'] = $name;
            $a['y'] = $hasil;
            array_push($tampung, $a);
        }
        return view('admin.fikes.presma.chart', compact('tampung'));
    }
    public function record()
    {
        $data = HasilVotingFikes::all();
        return view('admin.fikes.record', compact('data'));
    }
}