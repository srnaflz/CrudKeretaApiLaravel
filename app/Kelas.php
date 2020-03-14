<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    //
    public $fillable = ['id_pembeli'];
    public $timestamps = true;

    public function pembeli()
    {
        return $this->belongsTo('App\Pembeli','id_pembeli');
    }
    public function tiket(){
        return $this->hasOne('App\Tiket','id_tiket');
    }
    public function kasir()
    {
        return $this->belongsTo('App\Kasir','id_kasir');
    }
}
