<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ErrorFormStaff extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'jenis_kelamin' => 'required',
            'nomor_identitas' => 'required|unique:staff',
            'negara_penerbit_identitas' => 'required',
            'kode_lokasi' => 'required',
            'status_peran' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nomor_identitas.unique' => 'Nomor identitas staff sudah tersedia',
            'jenis_kelamin.required' => 'Pilih jenis kelamin terlebih dahulu',   
            'negara_penerbit_identitas.required' => 'Pilih negara penerbit identitas terlebih dahulu',
            'kode_lokasi.required' => 'Pilih lokasi terlebih dahulu',
            'status_peran.required' => 'Pilih peran terlebih dahulu',
        ];
    }
}
