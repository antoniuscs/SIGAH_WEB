<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisSeason extends Model
{
    protected $fillable = [
        'nama_jenis_season',
    ];

    public function get_season(){
        return $this->hasMany('App\Season');
    }
}
