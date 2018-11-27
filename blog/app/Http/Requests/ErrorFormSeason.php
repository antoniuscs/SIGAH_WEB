<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ErrorFormSeason extends FormRequest
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
            'nama_season' => 'required|unique:seasons',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
            'jenis_season' => 'required',
            'operasi_season' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'tanggal_selesai.after' => 'Tanggal selesai season harus setelah tanggal mulai season',
            'nama_season.unique' => 'Nama season telah digunakan',  
            'jenis_season.required' => 'Jenis season dipilih terlebih dahulu',
            'operasi_season.required' => 'Operasi season dipilih terlebih dahulu'
        ];
    }
}
