<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ErrorFormKamar extends FormRequest
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
            'nomor_kamar' => 'unique:kamars',
        ];
    }

    public function messages()
    {
        return [
            'nomor_kamar.unique' => 'Kode kamar telah digunakan',       
        ];
    }
}
