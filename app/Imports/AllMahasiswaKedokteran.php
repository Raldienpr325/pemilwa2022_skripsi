<?php

namespace App\Imports;

use App\Models\SemuaMahasiswaKedokteran;
use Maatwebsite\Excel\Concerns\ToModel;

class AllMahasiswaKedokteran implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SemuaMahasiswaKedokteran([
            'name' => $row[0],
            'email' => $row[1],
            'NIM' => $row[2],
            'prodi' => $row[3],
        ]);
    }
}
