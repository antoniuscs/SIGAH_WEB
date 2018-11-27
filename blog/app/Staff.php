<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Lokasi;
use Ap\Peran;

class Staff extends Model
{
    protected $fillable = [
        'id',
        'kode_staff',
        'nama_depan',
        'nama_belakang',
        'jenis_kelamin',
        'alamat',
        'nomor_identitas',
        'jenis_identitas',
        'negara_penerbit_identitas',
        'nomor_hp',
        'nomor_telp',
        'username',
        'password',
        'kode_lokasi',
        'status_peran',
    ];

    public function get_lokasi(){
        return $this->belongsTo('App\Lokasi','kode_lokasi');
    }

    public function get_peran(){
        return $this->belongsTo('App\Peran','status_peran');
    }

    public function get_nota(){
        return $this->hasMany('App\Nota');
    }

    public function get_reservasi(){
        return $this->hasMany('App\Reservasi');
    }
}
