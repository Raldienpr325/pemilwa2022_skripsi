<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\PresmaFikes;
use RealRashid\SweetAlert\Facades\Alert;

class PresmaFikesController extends Controller
{
    public function index()
    {
        $data = PresmaFikes::all();
        return view('admin.fikes.presma.index', compact('data'));
    }

    public function create()
    {
        return view('admin.fikes.presma.create');
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

        $data_presma['foto'] = $request->file('foto')->store('foto-presma-fikes');

        PresmaFikes::Create($data_presma);
        Alert::success('Berhasil', 'Data Presma Baru Disimpan!');
        return redirect()->route('presma-fikes.index');
    }

    public function edit($id)
    {
        $data = PresmaFikes::find($id);
        return view('admin.fikes.presma.edit', compact(['data', 'id']));
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

        PresmaFikes::where('id', $id)->update($validatedData);


        Alert::success('Berhasil', 'Data Presma Berhasil di update!');
        return redirect()->route('presma-fikes.index');
    }

    public function destroy($id)
    {
        try {
            $data = PresmaFikes::find($id);
            if ($data['foto']) {
                Storage::delete($data['foto']);
            }
            PresmaFikes::destroy($id);
            Alert::success('Berhasil', 'Data Presma berhasil dihapus!');
            return redirect()->route('presma-fikes.index');
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}