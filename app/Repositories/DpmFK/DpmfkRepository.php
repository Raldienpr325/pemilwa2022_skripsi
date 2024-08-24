<?php

namespace App\Repositories\DpmFK;

use App\Models\DpmFK;
use App\Repositories\BaseRepositoryEloquent;
use App\Models\HasilVotingFk;

class DpmFKRepository extends BaseRepositoryEloquent implements DpmFKRepositoryEloquent
{
    public function __construct(DpmFK $model)
    {
        parent::__construct($model);
    }

    public function chartPresma()
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
        return [
            'data' => $data,
            'tampung' => $tampung
        ];
    }

    public function chartDpm(){
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
        return $tampung;
    }
}
