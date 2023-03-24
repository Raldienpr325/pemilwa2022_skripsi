<?php

namespace App\Http\Controllers;

use App\Models\DpmFikes;
use App\Models\DpmFK;
use App\Models\HasilVotingFikes;
use App\Models\HasilVotingFk;
use App\Models\PresmaFikes;
use App\Models\PresmaFK;
use RealRashid\SweetAlert\Facades\Alert;

class VotingController extends Controller
{
    public function votingPresmaFk()
    {
        $presma = HasilVotingFk::where('users_id', auth('user')->user()->id)->first('presma_id');
        $count = HasilVotingFk::all();
        $count = $count->groupBy('presma_id', true)
            ->map(function ($item) {
                return $item->count();
            })->toArray();

        $data = PresmaFK::all();
        return view('mahasiswa.kedokteran.votepresma', compact(['data', 'count', 'presma']));
    }

    public function votingDpmFk()
    {
        $dpm = HasilVotingFk::where('users_id', auth('user')->user()->id)->first('dpm_id');
        $data = DpmFK::all();
        return view('mahasiswa.kedokteran.votedpm', compact(['data', 'dpm']));
    }

    public function storeVoting($id)
    {
        $checkPresma = HasilVotingFk::where('users_id', auth('user')->user()->id)
            ->whereNull('presma_id')
            ->get();
        $checkDpm = HasilVotingFk::where('users_id', auth('user')->user()->id)
            ->whereNotNull('dpm_id')
            ->get('dpm_id');

        if ($checkPresma && $checkDpm != 'null') {
            $data['presma_id'] = $id;
            HasilVotingFk::where('users_id', auth('user')->user()->id)->update($data);
        }
        HasilVotingFk::firstOrCreate(
            ['users_id' => auth('user')->user()->id],
            [
                'users_id' => auth('user')->user()->id,
                'presma_id' => $id
            ]
        );



        Alert::success('Berhasil', 'Voting Presma Berhasil');
        return redirect()->route('votingPresmaFk');
    }

    public function storeVoting2($id)
    {

        $checkDpm = HasilVotingFk::where('users_id', auth('user')->user()->id)
            ->whereNull('dpm_id')
            ->get();
        $checkPresma = HasilVotingFk::where('users_id', auth('user')->user()->id)
            ->whereNotNull('presma_id')
            ->get('presma_id');

        if ($checkDpm && $checkPresma != 'null') {
            $data['dpm_id'] = $id;
            HasilVotingFk::where('users_id', auth('user')->user()->id)->update($data);
        }
        HasilVotingFk::firstOrCreate(
            ['users_id' => auth('user')->user()->id],
            [
                'users_id' => auth('user')->user()->id,
                'dpm_id' => $id
            ]
        );


        Alert::success('Berhasil', 'Voting DPM Berhasil');
        return redirect()->route('votingDpmFk');
    }

    public function votingPresmaFikes()
    {
        $presma = HasilVotingFikes::where('users_id', auth('user')->user()->id)->first('presma_id');
        $dataFikes = PresmaFikes::all();
        return view('mahasiswa.fikes.votepresma', compact(['dataFikes', 'presma']));
    }

    public function votingDpmFikes()
    {
        $dpm = HasilVotingFikes::where('users_id', auth('user')->user()->id)->first('dpm_id');
        $dataFikes = DpmFikes::all();
        return view('mahasiswa.fikes.votedpm', compact(['dataFikes', 'dpm']));
    }

    public function storeVoting3($id)
    {
        $checkPresma = HasilVotingFikes::where('users_id', auth('user')->user()->id)
            ->whereNull('presma_id')
            ->get();
        $checkDpm = HasilVotingFikes::where('users_id', auth('user')->user()->id)
            ->whereNotNull('dpm_id')
            ->get('dpm_id');

        if ($checkPresma && $checkDpm != 'null') {
            $data['presma_id'] = $id;
            HasilVotingFikes::where('users_id', auth('user')->user()->id)->update($data);
        }
        HasilVotingFikes::firstOrCreate(
            ['users_id' => auth('user')->user()->id],
            [
                'users_id' => auth('user')->user()->id,
                'presma_id' => $id
            ]
        );


        Alert::success('Berhasil', 'Voting Presma Berhasil');
        return redirect()->route('votingPresmaFikes');
    }
    public function storeVoting4($id)
    {
        $checkDpm = HasilVotingFikes::where('users_id', auth('user')->user()->id)
            ->whereNull('dpm_id')
            ->get();
        $checkPresma = HasilVotingFikes::where('users_id', auth('user')->user()->id)
            ->whereNotNull('presma_id')
            ->get('presma_id');

        if ($checkDpm && $checkPresma != 'null') {
            $data['dpm_id'] = $id;
            HasilVotingFikes::where('users_id', auth('user')->user()->id)->update($data);
        }
        HasilVotingFikes::firstOrCreate(
            ['users_id' => auth('user')->user()->id],
            [
                'users_id' => auth('user')->user()->id,
                'dpm_id' => $id
            ]
        );


        Alert::success('Berhasil', 'Voting DPM Berhasil');
        return redirect()->route('votingDpmFikes');
    }
}