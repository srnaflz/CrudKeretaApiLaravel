<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    //
    public $fillable = ['nama','kelas','id_kereta'];
    public $timestamps = true;

    public function kereta()
    {
        return $this->belongsTo('App\Kereta','id_kereta');
    }
    public function tiket()
    {
        return $this->belongsToMany('App\Tiket',
                                    'pembeli_tiket',
                                    'id_tiket',
                                    'id_pembeli');
    }
    public function kasir()
    {
        return $this->hasMany('App\Kasir','id_pembeli');
    }
    public function kelas()
    {
        return $this->hasMany('App\Kelas','id_pembeli');
    }

}
