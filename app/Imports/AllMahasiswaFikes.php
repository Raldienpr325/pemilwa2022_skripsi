<?php

namespace App\Imports;

use App\Models\SemuaMahasiswaFikes;
use Maatwebsite\Excel\Concerns\ToModel;

class AllMahasiswaFikes implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SemuaMahasiswaFikes([
            'name' => $row[0],
            'email' => $row[1],
            'NIM' => $row[2],
            'prodi' => $row[3],
        ]);
    }
}
