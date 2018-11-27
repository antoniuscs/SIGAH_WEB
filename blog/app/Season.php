<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\JenisSeason;

class Season extends Model
{
    protected $fillable = [
        'nama_season',
        'tanggal_mulai',
        'tanggal_selesai',
        'operasi_season',
        'presentase_harga',
        'jenis_season'
    ];

    public function get_kamar(){
        return $this->hasMany('App\Kamar');
    }

    public function get_jenis_season(){
        return $this->belongsTo('App\JenisSeason','jenis_season');
    }
}
