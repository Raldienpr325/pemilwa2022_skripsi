<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SemuaMahasiswaFikes;
use App\Imports\AllMahasiswaFikes;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Repositories\Psikb\PsikbRepository;

class AdminControllerFIKES extends Controller
{
    protected $psikbsRepository;

    public function __construct(PsikbRepository $psikbRepository) {
        $this->psikbsRepository = $psikbRepository;
    }
    public function RecordPSIKL()
    {
        $datapemilih = DB::table('mahasiswapsikls')->get();
        return view('admin.fikes.recordPSIK', compact('datapemilih'));
    }

    public function RecordPSIKB()
    {
        $datapemilih = DB::table('mahasiswapsikbs')->get();
        return view('admin.fikes.recordPSIKB', compact('datapemilih'));
    }

    public function RecordPSIGL()
    {
        $datapemilih = DB::table('mahasiswapsigls')->get();
        return view('admin.fikes.recordPSIGL', compact('datapemilih'));
    }

    public function RecordPSIGB()
    {
        $datapemilih = DB::table('mahasiswapsigbs')->get();
        return view('admin.fikes.recordPSIGB', compact('datapemilih'));
    }

    public function AllMahasiswa(Request $request)
    {
        $search = $request->q;
        if ($search != "") {
            $data = SemuaMahasiswaFikes::where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('NIM,', 'like', '%' . $search . '%');
            })
                ->paginate(25);
            $data->appends(['q' => $search]);
        } else {
            $data = SemuaMahasiswaFikes::paginate(25);
        }
        return view('admin.fikes.semuamahasiswa', compact('data'));
    }

    public function ImportAllMahasiswa(Request $request)
    {
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataMahasiswaFikes', $namaFile);

        Excel::import(new AllMahasiswaFikes, public_path('/DataMahasiswaFikes/' . $namaFile));
        return redirect()->route('allmahasiswafikes');
    }
}
