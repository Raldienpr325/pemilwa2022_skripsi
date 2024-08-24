<?php

namespace App\Http\Requests;

use App\Models\PresmaFK;
use Illuminate\Foundation\Http\FormRequest;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\Facades\Storage;

class PresmaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [];
        if (request()->isMethod('POST')) {
            $rules = [
                // cek unik untuk data aktif saja, abaikan yg sudah softDelete
                'nama' => 'required',
                'nama_wakil' => 'required',
                'angkatan' => 'required',
                'prodi' => 'required',
                'nourut' => 'required|integer',
                'foto' => 'image|file|max:5000',
                'foto_wakil' => 'image|file|max:5000',
            ];
        } elseif (request()->isMethod('PUT')) {
            $rules = [
                'nama' => 'required',
                'nama_wakil' => 'required',
                'angkatan' => 'required',
                'prodi' => 'required',
                'nourut' => 'required|integer',
                'foto' => 'image|file|max:5000',
                'foto_wakil' => 'image|file|max:5000',
            ];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama tidak boleh kosong',
            'nourut.integer' => 'Harus angka',
        ];
    }

    public function store($old="",$oldWakil="")
    {
        $data = $this->validated();
        $data['nama'] = Purify::clean($data['nama']);
        $data['nama_wakil'] = Purify::clean($data['nama_wakil']);
        $data['nourut'] = Purify::clean($data['nourut']);
        $data['prodi'] = Purify::clean($data['prodi']);
        $data['angkatan'] = Purify::clean($data['angkatan']);

        $data_presma = [
            'nourut' => $data['nourut'],
            'nama' => $data['nama'],
            'prodi' => $data['prodi'],
            'angkatan' => $data['angkatan'],
            'nama_wakil' => $data['nama_wakil'],
        ];

        // dd($data);


        if(request()->isMethod("POST")){
            if ($this->hasFile('foto')) {
                $data_presma['foto'] = $this->file('foto')->store('foto-presma-fk');
            }

            if ($this->hasFile('foto_wakil')) {
                $data_presma['foto_wakil'] = $this->file('foto_wakil')->store('foto-presma-fk_wakil');
            }
        }else if(request()->isMethod("PUT")){
            if ($this->hasFile('foto')) {
                if ($this->oldFoto) {
                    Storage::delete($this->oldFoto);
                }
                $data_presma['foto'] = $this->file('foto')->store('foto-presma-fk');
            }

            if ($this->hasFile('foto_wakil')) {
                if ($this->oldFotoWakil) {
                    Storage::delete($this->oldFotoWakil);
                }
                $data_presma['foto_wakil'] = $this->file('foto_wakil')->store('foto-presma-fk_wakil');
            }
        }


        return $data_presma;
    }


}
