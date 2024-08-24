<?php

namespace App\Http\Controllers;

use App\Http\Requests\PresmaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\Testing\TestingRepository;
use Alert;
use App\Exports\UsersPSKED;
use App\Imports\AllMahasiswaKedokteran;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\SemuaMahasiswaKedokteran;
use Illuminate\Support\Facades\Storage;
use App\Repositories\PresmaFK\PresmaFKRepository;
use App\Repositories\Psked\PskedRepository;
use App\Repositories\Pskb\PskbRepository;
use App\Repositories\Pssf\PssfRepository;
class AdminFK extends Controller
{

    protected $presmaFKRepository;
    protected $pskedRepository;
    protected $testing;
    protected $pskbsRepository;
    protected $pssfRepository;

    public function __construct(
            TestingRepository $testing,
            PresmaFKRepository $presmaFKRepository,
            PskedRepository $pskedRepository,
            PskbRepository $pskbsRepository,
            PssfRepository $pssfRepository,
        ) {

        $this->testing = $testing;
        $this->presmaFKRepository = $presmaFKRepository;
        $this->pskedRepository = $pskedRepository;
        $this->pskbsRepository = $pskbsRepository;
        $this->pssfRepository = $pssfRepository;
    }
    public function DashboardAdmin()
    {
        $alert =  Alert::success('Selamat Datang', 'Kamu Berhasil Login Admin');
        if (auth('admin')->user()->nama == "Admin FK") {
            $alert;
            return redirect('presma-fk');
        } else if (auth('admin')->user()->nama == "Admin FIKES") {
            $alert;
            return redirect('presma-fikes');
        } else if (auth('admin')->user()->nama == "Super Admin") {
            $alert;
            return redirect('presma-fk');
        }
    }

    public function index()
    {
        $datapresmafk = $this->presmaFKRepository->getAllData();
        return view('admin.kedokteran.presma.presma', compact('datapresmafk'));
    }

    public function create()
    {
        return view('admin.kedokteran.presma.input');
    }

    public function store(PresmaRequest $request)
    {
        $data_presma = $request->store();
        $operation = $this->presmaFKRepository->store($data_presma);

        if($operation){
            Alert::success('Berhasil', 'Data Presma Baru Disimpan!');
            return redirect()->route('presma-fk.index');
        }

    }

    public function edit($id)
    {
        $data = $this->presmaFKRepository->getByPrimaryKey($id);
        return view('admin.kedokteran.presma.edit', compact('id', 'data'));
    }

    public function update(PresmaRequest $request, $id)
    {
        $oldFoto = $request['oldFoto'];
        $oldFotoWakil = $request['oldFotoWakil'];
        $validatedData = $request->store($oldFoto,$oldFotoWakil);
        $this->presmaFKRepository->updateByPrimaryKey($id,$validatedData);

        Alert::success('Berhasil', 'Data Presma Berhasil di update!');
        return redirect()->route('presma-fk.index');
    }

    public function destroy($id)
    {


        try {
            $data = $this->presmaFKRepository->getAllData([
                'find' => $id
            ]);

            if ($data['foto']) {
                Storage::delete($data['foto']);
            }
            if ($data['foto_wakil']) {
                Storage::delete($data['foto_wakil']);
            }
            $this->presmaFKRepository->deleteByPrimaryKey($id);
            Alert::success('Berhasil', 'Data Presma berhasil dihapus!');
            return redirect()->route('presma-fk.index');
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function RecordPSKED()
    {
        $datapemilih = $this->pskedRepository->getAllData();
        return view('admin.kedokteran.recordPSKED', compact('datapemilih'));
    }

    public function ExportPSKED()
    {
        return Excel::download(new UsersPSKED, 'userspsked.xlsx');
    }

    public function Recordpskb()
    {
        $datapemilih = $this->pskbsRepository->getAllData();
        return view('admin.kedokteran.recordPSKB', compact('datapemilih'));
    }

    public function Recordpssf()
    {
        $datapemilih = $this->pssfRepository->getAllData();
        return view('admin.kedokteran.recordPSSF', compact('datapemilih'));
    }

    public function AllMahasiswa(Request $request)
    {
        $search = $request->q;
        if ($search != "") {
            $datas = SemuaMahasiswaKedokteran::where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('NIM', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            })->paginate(25);
            $datas->appends(['q' => $search]);
        } else {
            $datas = SemuaMahasiswaKedokteran::paginate(25);
        }
        return view('admin.kedokteran.semuamahasiswa', compact('datas'));
    }

    public function ImportAllMahasiswa(Request $request)
    {
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataMahasiswaKedokteran', $namaFile);

        Excel::import(new AllMahasiswaKedokteran, public_path('/DataMahasiswaKedokteran/' . $namaFile));
        return redirect()->route('allmahasiswa');
    }
}
