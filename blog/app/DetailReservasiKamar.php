<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Reservasi;
use App\Kamar;

class DetailReservasiKamar extends Model
{
    protected $fillable = [
        'kode_booking',
        'kode_kamar',
        'jumlah_kamar',
    ];

    public function get_reservasi(){
        return $this->belongsTo('App\Reservasi','kode_booking');
    }

    public function get_kamar(){
        return $this->belongsTo('App\Kamar','kode_kamar');
    }
}
