<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Peran;

class Customer extends Model
{
    protected $fillable = [
        'titel',
        'nama_depan',
        'nama_belakang',
        'nama_instansi',
        'alamat',
        'nomor_identitas',
        'jenis_identitas',
        'negara_penerbit_identitas',
        'tanggal_lahir',
        'nomor_hp',
        'nomor_telp',
        'email',
        'password',
        'status_peran',
    ];

    public function get_peran(){
        return $this->belongsTo('App\Peran','status_peran');
    }

    public function get_reservasi(){
        return $this->hasMany('App\Reservasi');
    }
}
