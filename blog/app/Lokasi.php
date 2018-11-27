<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $fillable = [
        'nama_provinsi',
        'nama_kota_kabupaten',
        'alamat',
        'kode_pos',
        'nomor_telp'
    ];

    public function get_kamar(){
        return $this->hasMany('App\Kamar');
    }

    public function get_reservasi(){
        return $this->hasMany('App\Reservasi');
    }

    public function get_staff(){
        return $this->hasMany('App\Staff');
    }
}
