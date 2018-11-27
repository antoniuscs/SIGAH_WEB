<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ErrorFormRequest extends FormRequest
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
            'nama_tempat_tidur' => 'required|unique:tempat_tidurs',
        ];
    }

    public function messages()
    {
        return [
            'nama_tempat_tidur.unique' => 'Nama tempat tidur telah digunakan',   
        ];
    }
}
