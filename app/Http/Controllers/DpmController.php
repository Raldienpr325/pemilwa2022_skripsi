<?php

namespace App\Http\Controllers;

use App\Models\DpmFK;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class DpmController extends Controller
{
    public function index()
    {
        $data = DpmFK::all();
        return view('admin.kedokteran.dpm.main', compact('data'));
    }
    public function create()
    {
        return view('admin.kedokteran.dpm.input');
    }
    public function store(Request $request)
    {
        $data_Dpm = $request->validate([
            'nama' => 'required',
            'angkatan' => 'required',
            'prodi' => 'required',
            'nourut' => 'required',
            'foto' => 'image|file|max:5000',
        ]);

        $data_Dpm['foto'] = $request->file('foto')->store('foto-DPM-fk');

        DpmFK::Create($data_Dpm);
        Alert::success('Berhasil', 'Data DPM Baru Disimpan!');
        return redirect()->route('dpm-fk.index');
    }
    public function edit($id)
    {
        $data = DpmFK::find($id);
        return view('admin.kedokteran.dpm.edit', compact(['data', 'id']));
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
            $validatedData['foto'] = $request->file('foto')->store('foto-DPM-fk');
        }
        $validatedData['nama'] = $request->nama;
        $validatedData['prodi'] = $request->prodi;
        $validatedData['nourut'] = $request->nourut;
        $validatedData['angkatan'] = $request->angkatan;

        DpmFK::where('id', $id)->update($validatedData);


        Alert::success('Berhasil', 'Data DPM Berhasil di update!');
        return redirect()->route('dpm-fk.index');
    }

    public function destroy($id)
    {
        try {
            $data = DpmFK::find($id);
            if ($data['foto']) {
                Storage::delete($data['foto']);
            }
            DpmFK::destroy($id);
            Alert::success('Berhasil', 'Data DPM berhasil dihapus!');
            return redirect()->route('dpm-fk.index');
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}