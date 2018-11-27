<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempatTidur extends Model
{
    protected $fillable = [
        'nama_tempat_tidur',
        'jumlah'
    ];

    public function get_jenis_kamar(){
        return $this->hasMany('App\JenisKamar');
    }

    public function get_detail_reservasi(){
        return $this->hasMany('App\DetailReservasi');
    }
}
