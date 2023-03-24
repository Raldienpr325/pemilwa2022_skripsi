<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::Create([
            'nama' => "Admin FK",
            'email' => "fakultaskedokteran2022@gmail.com",
            'is_admin' => 1,
            'password' => bcrypt('1234567890')
        ]);

        Admin::Create([
            'nama' => "Admin FIKES",
            'email' => "fakultasilmukesehatan2022@gmail.com",
            'is_admin' => 1,
            'password' => bcrypt('1234567890')
        ]);

        Admin::Create([
            'nama' => "Super Admin",
            'email' => "superadmin@gmail.com",
            'is_admin' => 1,
            'password' => bcrypt('1234567890')
        ]);
    }
}
