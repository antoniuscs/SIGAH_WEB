<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ErrorFormReservasi extends FormRequest
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
            'tanggal_check_out' => 'required|date|after:tanggal_check_in',
            'tanggal_pembayaran' => 'required|date|after_or_equal:tanggal_reservasi',
            'tanggal_pembayaran' => 'required|date|before_or_equal:tanggal_check_out',
        ];
    }

    public function messages()
    {
        return [
            'tanggal_check_out.after' => 'Tanggal check out reservasi harus setelah tanggal check in reservasi',
            'tanggal_pembayaran.after_or_equal' => 'Tanggal pembayaran reservasi harus sama atau setelah tanggal reservasi',
            'tanggal_pembayaran.before_or_equal' => 'Tanggal pembayaran reservasi harus sama atau sebelum tanggal check out',
        ];
    }
}
