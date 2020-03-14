<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    //
    public function kasir()
    {
        return $this->belongsTo('App\Kasir','id_kasir');
    }
    
    public function kelas()
    {
        return $this->belongsTo('App\Kelas','id_kelas');
    }
    public function pembeli()
    {
        return $this->belongsToMany('App\Pembeli',
                                    'pembeli_tiket',
                                    'id_tiket',
                                    'id_pembeli');
    }

}
