<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ErrorFormJenisKamar extends FormRequest
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
            'nama_jenis_kamar' => 'required|unique:jenis_kamars',
            'gambar' => 'mimes:jpg,gif,JPEG,jpeg,png,bmp',
        ];
    }

    public function messages()
    {
        return [
            'nama_jenis_kamar.unique' => 'Nama jenis kamar telah digunakan',
            'gambar.mimes' => 'Gambar harus bertipe: .jpg, .jpeg, .JPEG, .png, .gif, .bmp' 
        ];
    }
}
