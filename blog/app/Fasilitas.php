<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    protected $fillable = [
        'nama_fasilitas',
        'harga_fasilitas',
    ];

    public function get_detail_reservasi(){
        return $this->hasMany('App\DetailReservasi');
    }
}
