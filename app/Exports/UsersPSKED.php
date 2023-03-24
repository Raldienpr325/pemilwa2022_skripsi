<?php

namespace App\Exports;

use App\Models\Mahasiswapsked;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersPSKED implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Mahasiswapsked::all();
    }
}
