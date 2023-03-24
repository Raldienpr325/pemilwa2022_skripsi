<?php

namespace Database\Seeders;

use App\Models\DpmFK;
use App\Models\PresmaFK;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatadummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PresmaFK::Create([
            'nourut' => '1',
            'nama' => 'aldien',
            'angkatan' => '2020',
            'prodi' => 'FK',
            'foto' => '/'
        ]);
        DpmFK::Create([
            'nourut' => '1',
            'nama' => 'aldien',
            'angkatan' => '2020',
            'prodi' => 'FK',
            'foto' => '/'
        ]);
    }
}