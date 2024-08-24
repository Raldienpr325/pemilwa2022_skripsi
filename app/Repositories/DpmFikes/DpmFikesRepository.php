<?php

namespace App\Repositories\DpmFikes;

use App\Models\DpmFikes;
use App\Repositories\BaseRepositoryEloquent;
use App\Models\HasilVotingFikes;

class DpmFikesRepository extends BaseRepositoryEloquent implements DpmFikesRepositoryEloquent
{
    public function __construct(DpmFikes $model)
    {
        parent::__construct($model);
    }

    public function chartDPM()
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
        return $tampung;
    }
    public function chartPresma()
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
        return $tampung;
    }
}
