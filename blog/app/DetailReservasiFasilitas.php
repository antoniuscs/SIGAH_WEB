<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Reservasi;
use App\Fasilitas;

class DetailReservasiFasilitas extends Model
{
    protected $fillable = [
        'kode_booking',
        'kode_fasilitas',
        'jumlah_fasilitas',
        'tanggal_fasilitas',
    ];

    public function get_reservasi(){
        return $this->belongsTo('App\Reservasi','kode_booking');
    }

    public function get_fasilitas(){
        return $this->belongsTo('App\Fasilitas','kode_fasilitas');
    }

}
