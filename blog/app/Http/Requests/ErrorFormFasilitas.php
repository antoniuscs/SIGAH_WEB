<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ErrorFormFasilitas extends FormRequest
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
            'nama_fasilitas' => 'required|unique:fasilitas',
        ];
    }

    public function messages()
    {
        return [
            'nama_fasilitas.unique' => 'Nama fasilitas telah digunakan',   
        ];
    }
}
