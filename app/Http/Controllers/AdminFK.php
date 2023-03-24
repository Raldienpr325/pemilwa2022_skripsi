<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PresmaFK;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Alert;
use App\Exports\UsersPSKED;
use App\Imports\AllMahasiswaKedokteran;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\SemuaMahasiswaKedokteran;
use Illuminate\Support\Facades\Storage;

class AdminFK extends Controller
{
    public function DashboardAdmin()
    {
        if (auth('admin')->user()->nama == "Admin FK") {
            Alert::success('Selamat Datang', 'Kamu Berhasil Login Admin');
            return redirect('presma-fk');
        } else if (auth('admin')->user()->nama == "Admin FIKES") {
            Alert::success('Selamat Datang', 'Kamu Berhasil Login Admin');
            return redirect('presma-fikes');
        } else if (auth('admin')->user()->nama == "Super Admin") {
            Alert::success('Selamat Datang', 'Kamu Berhasil Login Admin');
            return redirect('presma-fk');
        }
    }

    public function index()
    {
        $datapresmafk = DB::table('presmafk')->get();
        return view('admin.kedokteran.presma.presma', compact('datapresmafk'));
    }

    public function create()
    {
        return view('admin.kedokteran.presma.input');
    }

    public function store(Request $request)
    {
        $data_presma = $request->validate([
            'nama' => 'required',
            'angkatan' => 'required',
            'prodi' => 'required',
            'nourut' => 'required',
            'foto' => 'image|file|max:5000',
        ]);

        $data_presma['foto'] = $request->file('foto')->store('foto-presma-fk');

        PresmaFK::Create($data_presma);
        Alert::success('Berhasil', 'Data Presma Baru Disimpan!');
        return redirect()->route('presma-fk.index');
    }

    public function edit($id)
    {
        $data = DB::table('presmafk')->where('id', '=', $id)->first();
        return view('admin.kedokteran.presma.edit', compact('id', 'data'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'nama' => 'string',
            'prodi' => 'string',
            'nourut' => 'numeric',
            'angkatan' => 'numeric',
            'foto' => 'image|file|max:5024'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('foto')) {
            if ($request->oldFoto) {
                Storage::delete($request->oldFoto);
            }
            $validatedData['foto'] = $request->file('foto')->store('foto-presma-fk');
        }
        $validatedData['nama'] = $request->nama;
        $validatedData['prodi'] = $request->prodi;
        $validatedData['nourut'] = $request->nourut;
        $validatedData['angkatan'] = $request->angkatan;

        PresmaFK::where('id', $id)->update($validatedData);


        Alert::success('Berhasil', 'Data Presma Berhasil di update!');
        return redirect()->route('presma-fk.index');
    }


    public function destroy($id)
    {
        try {
            $data = PresmaFK::find($id);
            if ($data['foto']) {
                Storage::delete($data['foto']);
            }
            PresmaFK::destroy($id);
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
        $datapemilih = DB::table('mahasiswapskeds')->get();
        return view('admin.kedokteran.recordPSKED', compact('datapemilih'));
    }

    public function ExportPSKED()
    {
        return Excel::download(new UsersPSKED, 'userspsked.xlsx');
    }

    public function Recordpskb()
    {
        $datapemilih = DB::table('mahasiswapskbs')->get();
        return view('admin.kedokteran.recordPSKB', compact('datapemilih'));
    }

    public function Recordpssf()
    {
        $datapemilih = DB::table('mahasiswapssfs')->get();
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