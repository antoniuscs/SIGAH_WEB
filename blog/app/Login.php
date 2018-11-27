<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Login extends Model
{
    protected $fillable = [
        'username_email', 
        'password', 
        'status_peran',
    ];

    protected $hidden = [
        'password', 
        'remember_token',
    ];

    public function get_peran(){
        return $this->belongsTo('App\Peran','status_peran');
    }
}
