<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peran extends Model
{
    protected $fillable = [
        'nama_peran',
        'kode_peran',
    ];

    public function get_customer(){
        return $this->hasMany('App\Customer');
    }

    public function get_staff(){
        return $this->hasMany('App\Staff');
    }

    public function get_login(){
        return $this->hasMany('App\Login');
    }

    public function get_user(){
        return $this->hasMany('App\User');
    }
}
