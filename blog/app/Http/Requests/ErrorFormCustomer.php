<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ErrorFormCustomer extends FormRequest
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
            'titel' => 'required',
            'nomor_identitas' => 'required|unique:customers',
            'negara_penerbit_identitas' => 'required',
            'status_peran' => 'required',
            'email' => 'required|unique:customers'
        ];
    }

    public function messages()
    {
        return [
            'nomor_identitas.unique' => 'Nomor identitas customer sudah tersedia',
            'titel.required' => 'Pilih titel terlebih dahulu',   
            'negara_penerbit_identitas.required' => 'Pilih negara penerbit identitas terlebih dahulu',
            'status_peran.required' => 'Pilih peran terlebih dahulu',
            'email.unique' => 'Email sudah terdaftar di sistem',
        ];
    }
}
