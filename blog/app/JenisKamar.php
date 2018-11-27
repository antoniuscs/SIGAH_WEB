<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TempatTidur;

class JenisKamar extends Model
{
    protected $fillable = [
        'nama_jenis_kamar',
        'gambar',
        'kode_jenis_kamar',
        'detail_jenis_kamar',
        'pilihan_tempat_tidur_1',
        'pilihan_tempat_tidur_2',
        'kapasitas',
        'harga_jenis_kamar'
    ];

    public function get_tempat_tidur(){
        return $this->belongsTo('App\TempatTidur','pilihan_tempat_tidur_1');
    }

    public function get_tempat_tidur_2(){
        return $this->belongsTo('App\TempatTidur','pilihan_tempat_tidur_2');
    }

    public function get_kamar(){
        return $this->hasMany('App\Kamar');
    }
}
