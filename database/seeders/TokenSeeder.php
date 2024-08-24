<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TokenUser;
use Illuminate\Support\Facades\Hash;

class TokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        TokenUser::create([
            'token' => 789876,
            'name' => strtoupper('WISNU BARLIANTO'),
            'email' => 'dekanfk@gmail.com',
            'given_name' => 'WISNU',
            'family_name' => 'BARLIANTO',
            'NIM' => '000000000000000',
            'prodi' => 'Dekan FK',
            'hd' => 'student.ub.ac.id',
            'password' => 1234567890,
        ]);

        TokenUser::create([
            'token' => 746583,
            'name' => strtoupper('MOHAMMAD SAIFUR ROHMAN'),
            'email' => 'wakadek1@gmail.com',
            'given_name' => 'SAIFUR',
            'family_name' => 'ROHMAN',
            'NIM' => '111111111111111',
            'prodi' => 'Wakadek I FK',
            'hd' => 'student.ub.ac.id',
            'password' => 1234567890,
        ]);

        TokenUser::create([
            'token' => 898765,
            'name' => strtoupper('MASRUROH RAHAYU'),
            'email' => 'wakadek2@gmail.com',
            'given_name' => 'MASRUROH',
            'family_name' => 'RAHAYU',
            'NIM' => '333333333333333',
            'prodi' => 'Wakadek II FK',
            'hd' => 'student.ub.ac.id',
            'password' => 1234567890,
        ]);

        TokenUser::create([
            'token' => 453427,
            'name' => strtoupper('ERIKO PRAWESTININGTYAS'),
            'email' => 'wakadek3@gmail.com',
            'given_name' => 'ERIKO',
            'family_name' => 'PRAWESTININGTYAS',
            'NIM' => '444444444444444',
            'prodi' => 'Wakadek III FK',
            'hd' => 'student.ub.ac.id',
            'password' => 1234567890,
        ]);

        TokenUser::create([
            'token' => 989560,
            'name' => strtoupper('SUMINARTI'),
            'email' => 'tatausaha@gmail.com',
            'given_name' => 'SUMINARTI',
            'family_name' => '-',
            'NIM' => '555555555555555',
            'prodi' => 'Tata Usaha',
            'hd' => 'student.ub.ac.id',
            'password' => 1234567890,
        ]);

        TokenUser::create([
            'token' => 980765,
            'name' => strtoupper('ARCI NISITA CANDRA'),
            'email' => 'akademik@gmail.com',
            'given_name' => 'ARCI',
            'family_name' => 'NISITA',
            'NIM' => '666666666666666',
            'prodi' => 'Akademik',
            'hd' => 'student.ub.ac.id',
            'password' => 1234567890,
        ]);

        TokenUser::create([
            'token' => 162538,
            'name' => strtoupper('SUYANTO'),
            'email' => 'kasubagumum@gmail.com',
            'given_name' => 'SUYANTO',
            'family_name' => '-',
            'NIM' => '777777777777777',
            'prodi' => 'Kasubag Umum',
            'hd' => 'student.ub.ac.id',
            'password' => 1234567890,
        ]);

        TokenUser::create([
            'token' => 172635,
            'name' => strtoupper('ANA LUTFIA'),
            'email' => 'kasubagkeuangan@gmail.com',
            'given_name' => 'ANA',
            'family_name' => 'LUTFIA',
            'NIM' => '888888888888888',
            'prodi' => 'Kasubag Keuangan',
            'hd' => 'student.ub.ac.id',
            'password' => 1234567890,
        ]);

        TokenUser::create([
            'token' => 102936,
            'name' => strtoupper('SRI WINARSIH'),
            'email' => 'kajurfarmasi@gmail.com',
            'given_name' => 'SRI',
            'family_name' => 'WINARSIH',
            'NIM' => '999999999999999',
            'prodi' => 'Kajur Farmasi',
            'hd' => 'student.ub.ac.id',
            'password' => 1234567890,
        ]);

        TokenUser::create([
            'token' => 283746,
            'name' => strtoupper('NUR SAMSU'),
            'email' => 'kajurkedokteran@gmail.com',
            'given_name' => 'NUR',
            'family_name' => 'SAMSU',
            'NIM' => '989898989898989',
            'prodi' => 'Kajur Kedokteran',
            'hd' => 'student.ub.ac.id',
            'password' => 1234567890,
        ]);

        TokenUser::create([
            'token' => 283760,
            'name' => strtoupper('BAMBANG RAHARDJO'),
            'email' => 'kajurkebidanan@gmail.com',
            'given_name' => 'BAMBANG',
            'family_name' => 'RAHARDJO',
            'NIM' => '898988989889898',
            'prodi' => 'Kajur Kebidanan',
            'hd' => 'student.ub.ac.id',
            'password' => 1234567890,
        ]);

        TokenUser::create([
            'token' => 367459,
            'name' => strtoupper('TRIWAHJU ASTUTI'),
            'email' => 'kaprodipsked@gmail.com',
            'given_name' => 'TRIWAHJU',
            'family_name' => 'ASTUTI',
            'NIM' => '787877878778787',
            'prodi' => 'Kaprodi PSKED',
            'hd' => 'student.ub.ac.id',
            'password' => 1234567890,
        ]);

        TokenUser::create([
            'token' => 827659,
            'name' => strtoupper('ALVAN FEBRIAN SHALAS'),
            'email' => 'kaprodipssf@gmail.com',
            'given_name' => 'ALVAN',
            'family_name' => 'FEBRIAN',
            'NIM' => '878787878787887',
            'prodi' => 'Kaprodi PSSF',
            'hd' => 'student.ub.ac.id',
            'password' => 1234567890,
        ]);

        TokenUser::create([
            'token' => 645679,
            'name' => strtoupper('DICKY FAIZAL IRNANDI'),
            'email' => 'tendik1@gmail.com',
            'given_name' => 'DICKY',
            'family_name' => 'FAIZAL',
            'NIM' => '767676767676767',
            'prodi' => 'Tendik 1',
            'hd' => 'student.ub.ac.id',
            'password' => 1234567890,
        ]);

        TokenUser::create([
            'token' => 452326,
            'name' => strtoupper('RAHMA DIAN'),
            'email' => 'tendik2@gmail.com',
            'given_name' => 'RAHMA',
            'family_name' => 'DIAN',
            'NIM' => '676766767667676',
            'prodi' => 'Tendik 2',
            'hd' => 'student.ub.ac.id',
            'password' => 1234567890,
        ]);

        TokenUser::create([
            'token' => 253498,
            'name' => strtoupper('HIKMAWAN WAHYU SULISTOMO'),
            'email' => 'tendik3@gmail.com',
            'given_name' => 'HIKMAWAN',
            'family_name' => 'WAHYU',
            'NIM' => '565655656556565',
            'prodi' => 'Tendik 3',
            'hd' => 'student.ub.ac.id',
            'password' => 1234567890,
        ]);

        TokenUser::create([
            'token' => 567993,
            'name' => strtoupper('LILIK INDAHWATI'),
            'email' => 'kaprodipskb@gmail.com',
            'given_name' => 'LILIK',
            'family_name' => 'INDAHWATI',
            'NIM' => '545454545454545',
            'prodi' => 'Kaprodi PSKB',
            'hd' => 'student.ub.ac.id',
            'password' => 1234567890,
        ]);
    }
}
