<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Reservasi;
use App\DetailReservasi;

class Transaksi extends Model
{
    protected $fillable = [
        'kode_booking',
        'total_keseluruhan',
        'uang_deposit',
        'uang_jaminan',
        'tanggal_pelunasan',
        'jenis_pembayaran',
        'nomor_identitas_pembayaran',
        'total_bayar',
        'status_pembayaran'
    ];

    public function get_reservasi(){
        return $this->belongsTo('App\Reservasi','kode_booking');
    }

    public function get_nota(){
        return $this->hasMany('App\Nota');
    }
}
