<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\JenisKamar;
use App\Season;

class Kamar extends Model
{
    protected $fillable = [
        'kode_kamar',
        'kode_jenis_kamar',
        'nomor_kamar',
        'nomor_lantai',
        'status_season',
        'harga_kamar',
        'kode_lokasi',
        'status_smoking',
        'status_kamar'
    ];

    public function get_lokasi(){
        return $this->belongsTo('App\Lokasi','kode_lokasi');
    }
    
    public function get_kamar(){
        return $this->belongsTo('App\JenisKamar','kode_jenis_kamar');
    }

    public function get_season(){
        return $this->belongsTo('App\Season','status_season');
    }

    public function get_detail_reservasi(){
        return $this->hasMany('App\DetailReservasi');
    }

}
