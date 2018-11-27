<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Staff;
use App\Reservasi;
use App\Transaksi;
use App\DetailReservasi;

class Nota extends Model
{
    protected $fillable = [
        'nomor_invoice',
        'kode_staff',
        'tanggal_cetak_nota',
        'total_bayar_reservasi',
        'pajak',
        'total_keseluruhan',
        'uang_jaminan',
        'uang_deposit',
        'total_bayar',
        'kode_booking',
        'kode_transaksi',
    ];

    public function get_staff(){
        return $this->belongsTo('App\Staff','kode_staff');
    }

    public function get_reservasi(){
        return $this->belongsTo('App\Reservasi','kode_booking');
    }

    public function get_transaksi(){
        return $this->belongsTo('App\Transaksi','kode_transaksi');
    }

}
