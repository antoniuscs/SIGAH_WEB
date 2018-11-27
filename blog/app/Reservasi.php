<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DetailReservasiKamar;
use App\DetailReservasiFasilitas;
use App\Customer;
use App\Staff;
use App\Lokasi;
use App\Kamar;
use App\Fasilitas;
use App\Reservasi;

class Reservasi extends Model
{
    protected $fillable = [
        'id_booking',
        'kode_customer',
        'kode_staff',
        'jumlah_dewasa',
        'jumlah_anak',
        'tanggal_check_in',
        'tanggal_check_out',
        'tanggal_reservasi',
        'tanggal_pembayaran',
        'status_reservasi',
        'kode_lokasi',
    ];

    public function get_reservasi(){
        return $this->belongsTo('App\Reservasi','kode_booking');
    }

    public function get_fasilitas(){
        return $this->belongsTo('App\Fasilitas','kode_fasilitas');
    }
    
    public function get_kamar(){
        return $this->belongsTo('App\Kamar','kode_kamar');
    }

    public function get_customer(){
        return $this->belongsTo('App\Customer','kode_customer');
    }

    public function get_staff(){
        return $this->belongsTo('App\Staff','kode_staff');
    }

    public function get_lokasi(){
        return $this->belongsTo('App\Lokasi','kode_lokasi');
    }

    public function get_transaksi(){
        return $this->hasMany('App\Transaksi');
    }

    public function get_nota(){
        return $this->hasMany('App\Nota');
    }

    public function get_detail_reservasi_kamar(){
        return $this->hasMany('App\DetailReservasiKamar');
    }

    public function get_detail_reservasi_fasilitas(){
        return $this->hasMany('App\DetailReservasiFasilitas');
    }
}
