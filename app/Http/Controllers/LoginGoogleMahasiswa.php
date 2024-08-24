<?php

namespace App\Http\Controllers;

use App\Models\HasilVotingFk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\HasilVotingFikes;
use App\Models\Mahasiswapsked;
use App\Models\Mahasiswapskb;
use App\Models\Mahasiswapssf;
use App\Models\Mahasiswapsikl;
use App\Models\Mahasiswapsikb;
use App\Models\Mahasiswapsigl;
use App\Models\Mahasiswapsigb;

class LoginGoogleMahasiswa extends Controller
{
    public function LoginUser()
    {
        return Socialite::driver('google')->redirect();
    }

    public function HandleCallbackGoogle(Request $request)
    {

        try {
            $user_google = Socialite::driver('google')->user();
            $domain_email = explode("@", $user_google->user['email']);

            if ($domain_email[1] == "student.ub.ac.id") {

                if (Auth::guard('user')->attempt([
                    'email' => $user_google->user['email'],
                    'password' => $user_google->user['id']
                ])) {

                    return redirect()->route('halaman-ceknim');
                } else {
                    User::Create([
                        'name' => strtoupper($user_google->user['name']),
                        'given_name' => $user_google->user['given_name'],
                        'family_name' => $user_google->user['family_name'],
                        'email' => $user_google->user['email'],
                        'hd' => $user_google->user['hd'],
                        'password' => Hash::make($user_google->user['id']),
                    ]);


                    Auth::guard('user')->attempt([
                        'email' => $user_google->user['email'],
                        'password' => $user_google->user['id']
                    ]);

                    return redirect()->route('halaman-ceknim');
                }
            } else {
                Alert::error('Gagal', 'Silahkan  Masuk Dengan Email UB!');
                return redirect()->route('home');
            }
        } catch (Throwable) {
            Alert::error('UPS!!', 'Something Went Wrong');
            return redirect()->route('home');
        }
    }

    public function CekNim()
    {
        return view('mahasiswa.ceknim');
    }

    public function HandleCeknim(Request $request)
    {

        //cek apakah nim milik fk
        // NIM FK:
        //=============
        // (PSKED)
        // 205070100111026
        // 215070101111037
        // 225070100111001

        // (PSSF)
        // 195070501111001
        // 215070501111018
        // 225070500111016

        // (PSKB)
        // 205070600111026
        // 215070601111003
        // 225070600111005

        // NIM FIKes:
        //=============
        // (PSIG)
        // 205070307111033
        // 215070300111046
        // 225170201111022

        // (PSIK)
        // 205070207111034
        // 215070200111072
        // 225170101111023
        $PSIGL = explode("50703", $request['NIM']);
        $PSIGB = explode("51702", $request['NIM']);
        $PSIKL = explode("50702", $request['NIM']);
        $PSIKB = explode("51701", $request['NIM']);

        $PSKED = explode("50701", $request['NIM']);
        $PSSF = explode("50705", $request['NIM']);
        $PSKB = explode("50706", $request['NIM']);

        // $validasiNIM = explode("5070", $request['NIM']);

        //Cek data apakah ada di database kedokteran
        $cek_nama_user_kedokteran = DB::table('semua_mahasiswa_kedokterans')->where('name', auth()->guard('user')->user()->name)->first();
        $cek_nim_user_kedokteran = DB::table('semua_mahasiswa_kedokterans')->where('NIM', $request['NIM'])->first();
        $cek_prodi_user_kedokteran = DB::table('semua_mahasiswa_kedokterans')->where('name', auth()->guard('user')->user()->name)->value('prodi');

        //Cek data apakah ada di database ilmu kesehatan
        $cek_nama_user_ilmukesehatan = DB::table('semua_mahasiswa_fikes')->where('name', auth()->guard('user')->user()->name)->first();
        $cek_nim_user_ilmukesehatan = DB::table('semua_mahasiswa_fikes')->where('NIM', $request['NIM'])->first();
        $cek_prodi_user_ilmukesehatan = DB::table('semua_mahasiswa_fikes')->where('name', auth()->guard('user')->user()->name)->value('prodi');
        if($cek_nama_user_kedokteran){
            if($cek_nim_user_kedokteran){
                DB::table('users')->where('name', auth()->guard('user')->user()->name)->update([
                'NIM' => $request['NIM'],
                'prodi' => $cek_prodi_user_kedokteran,
            ]);
                HasilVotingFk::firstOrCreate([
                                'users_id' => auth('user')->user()->id,
                            ], ['users_id' => auth('user')->user()->id,]);
                return redirect()->route('votingPresmaFk');
            }else{
                Alert::error('Maaf','Anda belum punya Hak Pilih, Silahkan hubungi pihak Panitia');
                return redirect()->route('home');
            }
        }elseif($cek_nama_user_ilmukesehatan){
            if($cek_nim_user_ilmukesehatan){
                DB::table('users')->where('name', auth()->guard('user')->user()->name)->update([
                    'NIM' => $request['NIM'],
                    'prodi' => $cek_prodi_user_ilmukesehatan,
                ]);
                HasilVotingFk::firstOrCreate([
                    'users_id' => auth('user')->user()->id,
                ], ['users_id' => auth('user')->user()->id,]);
                return redirect()->route('votingPresmaFikes');
            }else{
                Alert::error('Maaf','Anda belum punya Hak Pilih, Silahkan hubungi pihak Panitia');
                return redirect()->route('home');
            }
        }
        else{
            Alert::error('Maaf','Anda tidak punya Hak Pilih');
            return redirect()->route('home');
        }





        //Jika NIM KEDOKTERAN prodi PSKED
        // if (strlen($PSKED['0']) == "2" && strlen($PSKED['1']) == "8") {

        //     //jika benar milik fk, cek apakah auth sudah memiliki NIM dan sama dengan yang di input user, lanjut
        //     $cekkeberadaanNIM = DB::table('users')->where('email', auth()->guard('user')->user()->email)->value('NIM');
        //     if ($cekkeberadaanNIM == $request['NIM']) {
        //         HasilVotingFk::firstOrCreate([
        //             'users_id' => auth('user')->user()->id,
        //         ], ['users_id' => auth('user')->user()->id,]);
        //         //arahkan ke halaman vote
        //         return redirect()->route('votingPresmaFk');
        //     }
        //     //Jika user belum memiliki NIM, maka NIM dan Prodi dimasukkan
        //     else if ($cekkeberadaanNIM == null) {
        //         DB::table('users')->where('email', auth()->guard('user')->user()->email)->update([
        //             'NIM' => $request['NIM'],
        //             'prodi' => 'PSKED',
        //         ]);
        //         HasilVotingFk::firstOrCreate([
        //             'users_id' => auth('user')->user()->id,
        //         ], ['users_id' => auth('user')->user()->id,]);

        //         //masukkan ke table prodi psked
        //         Mahasiswapsked::Create([
        //             'name' => auth('user')->user()->name,
        //             'email' =>auth('user')->user()->email,
        //             'NIM' => $request['NIM'],
        //             'prodi' => "PSKED",
        //         ]);

        //         return redirect()->route('votingPresmaFk');
        //     } else {
        //         Alert::error('UPS', 'NIM anda bukan ini');
        //         return redirect()->route('halaman-ceknim');
        //     }
        // }

        // //Jika NIM KEDOKTERAN prodi PSSF
        // else if (strlen($PSSF['0']) == "2" && strlen($PSSF['1']) == "8") {
        //     //jika benar milik fk, cek apakah auth sudah memiliki NIM dan sama dengan yang di input user, lanjut
        //     $cekkeberadaanNIM = DB::table('users')->where('email', auth()->guard('user')->user()->email)->value('NIM');
        //     if ($cekkeberadaanNIM == $request['NIM']) {
        //         HasilVotingFk::firstOrCreate([
        //             'users_id' => auth('user')->user()->id,
        //         ], ['users_id' => auth('user')->user()->id,]);
        //         //arahkan ke halaman vote
        //         return redirect()->route('votingPresmaFk');
        //     }
        //     //Jika user belum memiliki NIM, maka NIM dan Prodi dimasukkan
        //     else if ($cekkeberadaanNIM == null) {
        //         DB::table('users')->where('email', auth()->guard('user')->user()->email)->update([
        //             'NIM' => $request['NIM'],
        //             'prodi' => 'PSSF',
        //         ]);
        //         HasilVotingFk::firstOrCreate([
        //             'users_id' => auth('user')->user()->id,
        //         ], ['users_id' => auth('user')->user()->id,]);

        //         Mahasiswapssf::Create([
        //             'name' => auth('user')->user()->name,
        //             'email' =>auth('user')->user()->email,
        //             'NIM' => $request['NIM'],
        //             'prodi' => "PSSF",
        //         ]);

        //         return redirect()->route('votingPresmaFk');
        //     } else {
        //         Alert::error('UPS', 'NIM anda bukan ini');
        //         return redirect()->route('halaman-ceknim');
        //     }
        // }

        // //Jika NIM KEDOKTERAN prodi PSKB
        // else if (strlen($PSKB['0']) == "2" && strlen($PSKB['1']) == "8") {
        //     //jika benar milik fk, cek apakah auth sudah memiliki NIM dan sama dengan yang di input user, lanjut
        //     $cekkeberadaanNIM = DB::table('users')->where('email', auth()->guard('user')->user()->email)->value('NIM');
        //     if ($cekkeberadaanNIM == $request['NIM']) {
        //         HasilVotingFk::firstOrCreate([
        //             'users_id' => auth('user')->user()->id,
        //         ], ['users_id' => auth('user')->user()->id,]);
        //         //arahkan ke halaman vote
        //         return redirect()->route('votingPresmaFk');
        //     }
        //     //Jika user belum memiliki NIM, maka NIM dan Prodi dimasukkan
        //     else if ($cekkeberadaanNIM == null) {
        //         DB::table('users')->where('email', auth()->guard('user')->user()->email)->update([
        //             'NIM' => $request['NIM'],
        //             'prodi' => 'PSKB',
        //         ]);
        //         HasilVotingFk::firstOrCreate([
        //             'users_id' => auth('user')->user()->id,
        //         ], ['users_id' => auth('user')->user()->id,]);

        //         Mahasiswapskb::Create([
        //             'name' => auth('user')->user()->name,
        //             'email' =>auth('user')->user()->email,
        //             'NIM' => $request['NIM'],
        //             'prodi' => "PSKB",
        //         ]);

        //         return redirect()->route('votingPresmaFk');
        //     } else {
        //         Alert::error('UPS', 'NIM anda bukan ini');
        //         return redirect()->route('halaman-ceknim');
        //     }
        // }


        // //==============================
        // //==============================           FIKES
        // //Jika NIM KEDOKTERAN prodi PSIGL
        // else if (strlen($PSIGL['0']) == "2" && strlen($PSIGL['1']) == "8") {
        //     //jika benar milik fk, cek apakah auth sudah memiliki NIM dan sama dengan yang di input user, lanjut
        //     $cekkeberadaanNIM = DB::table('users')->where('email', auth()->guard('user')->user()->email)->value('NIM');
        //     if ($cekkeberadaanNIM == $request['NIM']) {
        //         HasilVotingFikes::firstOrCreate([
        //             'users_id' => auth('user')->user()->id,
        //         ], ['users_id' => auth('user')->user()->id,]);
        //         //arahkan ke halaman vote
        //         return redirect()->route('votingPresmaFikes');
        //     }
        //     //Jika user belum memiliki NIM, maka NIM dan Prodi dimasukkan
        //     else if ($cekkeberadaanNIM == null) {
        //         DB::table('users')->where('email', auth()->guard('user')->user()->email)->update([
        //             'NIM' => $request['NIM'],
        //             'prodi' => 'PSIGL',
        //         ]);
        //         HasilVotingFikes::firstOrCreate([
        //             'users_id' => auth('user')->user()->id,
        //         ], ['users_id' => auth('user')->user()->id,]);

        //         Mahasiswapsigl::Create([
        //             'name' => auth('user')->user()->name,
        //             'email' =>auth('user')->user()->email,
        //             'NIM' => $request['NIM'],
        //             'prodi' => "PSIGL",
        //         ]);

        //         return redirect()->route('votingPresmaFikes');
        //     } else {
        //         Alert::error('UPS', 'NIM anda bukan ini');
        //         return redirect()->route('halaman-ceknim');
        //     }
        // }

        // //Jika NIM KEDOKTERAN prodi PSIGB
        // else if (strlen($PSIGB['0']) == "2" && strlen($PSIGB['1']) == "8") {
        //     //jika benar milik fk, cek apakah auth sudah memiliki NIM dan sama dengan yang di input user, lanjut
        //     $cekkeberadaanNIM = DB::table('users')->where('email', auth()->guard('user')->user()->email)->value('NIM');
        //     if ($cekkeberadaanNIM == $request['NIM']) {
        //         HasilVotingFikes::firstOrCreate([
        //             'users_id' => auth('user')->user()->id,
        //         ], ['users_id' => auth('user')->user()->id,]);
        //         //arahkan ke halaman vote
        //         return redirect()->route('votingPresmaFikes');
        //     }
        //     //Jika user belum memiliki NIM, maka NIM dan Prodi dimasukkan
        //     else if ($cekkeberadaanNIM == null) {
        //         DB::table('users')->where('email', auth()->guard('user')->user()->email)->update([
        //             'NIM' => $request['NIM'],
        //             'prodi' => 'PSIGB',
        //         ]);
        //         HasilVotingFikes::firstOrCreate([
        //             'users_id' => auth('user')->user()->id,
        //         ], ['users_id' => auth('user')->user()->id,]);

        //         Mahasiswapsigb::Create([
        //             'name' => auth('user')->user()->name,
        //             'email' =>auth('user')->user()->email,
        //             'NIM' => $request['NIM'],
        //             'prodi' => "PSIGB",
        //         ]);
        //         return redirect()->route('votingPresmaFikes');
        //     } else {
        //         Alert::error('UPS', 'NIM anda bukan ini');
        //         return redirect()->route('halaman-ceknim');
        //     }
        // }

        // //Jika NIM KEDOKTERAN prodi PSIKL
        // else if (strlen($PSIKL['0']) == "2" && strlen($PSIKL['1']) == "8") {
        //     //jika benar milik fk, cek apakah auth sudah memiliki NIM dan sama dengan yang di input user, lanjut
        //     $cekkeberadaanNIM = DB::table('users')->where('email', auth()->guard('user')->user()->email)->value('NIM');
        //     if ($cekkeberadaanNIM == $request['NIM']) {
        //         HasilVotingFikes::firstOrCreate([
        //             'users_id' => auth('user')->user()->id,
        //         ], ['users_id' => auth('user')->user()->id,]);
        //         //arahkan ke halaman vote
        //         return redirect()->route('votingPresmaFikes');
        //     }
        //     //Jika user belum memiliki NIM, maka NIM dan Prodi dimasukkan
        //     else if ($cekkeberadaanNIM == null) {
        //         DB::table('users')->where('email', auth()->guard('user')->user()->email)->update([
        //             'NIM' => $request['NIM'],
        //             'prodi' => 'PSIKL',
        //         ]);
        //         HasilVotingFikes::firstOrCreate([
        //             'users_id' => auth('user')->user()->id,
        //         ], ['users_id' => auth('user')->user()->id,]);

        //         Mahasiswapsikl::Create([
        //             'name' => auth('user')->user()->name,
        //             'email' =>auth('user')->user()->email,
        //             'NIM' => $request['NIM'],
        //             'prodi' => "PSIKL",
        //         ]);
        //         return redirect()->route('votingPresmaFikes');
        //     } else {
        //         Alert::error('UPS', 'NIM anda bukan ini');
        //         return redirect()->route('halaman-ceknim');
        //     }
        // }

        // //Jika NIM KEDOKTERAN prodi PSIKB
        // else if (strlen($PSIKB['0']) == "2" && strlen($PSIKB['1']) == "8") {
        //     //jika benar milik fk, cek apakah auth sudah memiliki NIM dan sama dengan yang di input user, lanjut
        //     $cekkeberadaanNIM = DB::table('users')->where('email', auth()->guard('user')->user()->email)->value('NIM');
        //     if ($cekkeberadaanNIM == $request['NIM']) {
        //         HasilVotingFikes::firstOrCreate([
        //             'users_id' => auth('user')->user()->id,
        //         ], ['users_id' => auth('user')->user()->id,]);
        //         //arahkan ke halaman vote
        //         return redirect()->route('votingPresmaFikes');
        //     }
        //     //Jika user belum memiliki NIM, maka NIM dan Prodi dimasukkan
        //     else if ($cekkeberadaanNIM == null) {
        //         DB::table('users')->where('email', auth()->guard('user')->user()->email)->update([
        //             'NIM' => $request['NIM'],
        //             'prodi' => 'PSIKB',
        //         ]);
        //         HasilVotingFikes::firstOrCreate([
        //             'users_id' => auth('user')->user()->id,
        //         ], ['users_id' => auth('user')->user()->id,]);


        //         Mahasiswapsikb::Create([
        //             'name' => auth('user')->user()->name,
        //             'email' =>auth('user')->user()->email,
        //             'NIM' => $request['NIM'],
        //             'prodi' => "PSIKB",
        //         ]);
        //         return redirect()->route('votingPresmaFikes');
        //     } else {
        //         Alert::error('UPS', 'NIM anda bukan ini');
        //         return redirect()->route('halaman-ceknim');
        //     }
        // }


        // //Jika NIM bukan Kedokteran
        // else {
        //     Alert::error('UPS!!', 'Kamu bukan Mahasiswa Kedokteran ya?');
        //     return redirect()->route('halaman-ceknim');
        // }
    }
}
