<?php

namespace App\Exports;

use App\Models\HasilVotingFk;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class fkexport implements FromCollection
{
    use Exportable;
    private $data;


    public function __construct(HasilVotingFk $data)
    {
        $this->data = $data;
    }


    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $data = HasilVotingFk::with(['presma', 'dpm', 'user'])->get();
        return $data;
    }
}