<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\HasilVotingFk;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('guest.main');
    }

    public function LoginAdmin()
    {
        return view('admin.login');
    }

    public function handleAdmin(Request $request)
    {
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashboard-admin');
        } else {
            Alert::error('Gagal', 'Email atau Password Salah!');
            return redirect()->route('login-admin');
        }
    }

    public function LoginKhusus()
    {
        return view('dosen.login');
    }

    public function HandleLoginKhusus(Request $request){
        $dekan = 789876;
        $waka1 = 746583;
        $waka2 = 898765;
        $waka3 = 453427;
        $katu = 989560;
        $kemahasiswaan = 980765;
        $miliknegara = 162538;
        $kepegawaian = 172635;
        $kajurdokter = 283746;
        $kajurfarmasi = 102936;
        $kajurbidan = 283760;
        $kaprodfsked = 367459;
        $kaprodpssf = 827659;
        $kaprodpskb = 567993;
        $nojab1 = 645679;
        $nojab2 = 452326;
        $nojab3 = 253498;

        if ($request['token'] == $dekan || $request['token'] == $waka1 || $request['token'] == $waka2 || $request['token'] == $waka3 || $request['token'] == $katu || $request['token'] == $kemahasiswaan || $request['token'] == $miliknegara || $request['token'] == $kepegawaian || $request['token'] == $kajurdokter || $request['token'] == $kajurfarmasi || $request['token'] == $kajurbidan || $request['token'] == $kaprodfsked || $request['token'] == $kaprodpssf || $request['token'] == $kaprodpskb || $request['token'] == $nojab1 || $request['token'] == $nojab2 || $request['token'] == $nojab3){
            //ambil data token sesuai data request
            $ambil_data = DB::table('token_users')->where('token', $request['token'])->first();
            $cek_keberadaan_token = DB::table('users')->where('name', $ambil_data->name)->first();
            if($cek_keberadaan_token)
            {
                    Auth::guard('user')->attempt([
                        'email' => $ambil_data->email,
                        'password' => $ambil_data->password
                    ]);
                return redirect()->route('votingPresmaFk');
            }


            User::Create([
                'name' => $ambil_data->name,
                'given_name' => $ambil_data->given_name,
                'family_name' => $ambil_data->family_name,
                'email' => $ambil_data->email,
                'NIM' => $ambil_data->NIM,
                'prodi' => $ambil_data->prodi,
                'hd' => $ambil_data->hd,
                'password' => Hash::make($ambil_data->password),

            ]);
                Auth::guard('user')->attempt([
                    'email' => $ambil_data->email,
                    'password' => $ambil_data->password
            ]);

            HasilVotingFk::firstOrCreate([
                'users_id' => auth('user')->user()->id,
            ], ['users_id' => auth('user')->user()->id,]);

            return redirect()->route('votingPresmaFk');

        }else{
            return redirect()->back();
        }

    }

    public function ChatAdmin()
    {
        return view('guest.user-service');
    }

    public function kirimAdmin(Request $request)
    {
        $name = $request['name'];
        $NIM = $request['NIM'];
        $prodi = $request['prodi'];
        $email = $request['email'];
        $pesan = $request['pesan'];
        $nomor_tempat_kirim = $request['nomor_wa'];
        return redirect("https://api.whatsapp.com/send?phone=$nomor_tempat_kirim&text=Nama:%20$name%20%0DNIM:%20$NIM%20%0DProdi:%20$prodi%20%0DEmail:%20$email%20%0DPesan:%20$pesan");
    }

    public function Logout()
    {
        return view('guest.main');
    }
}
