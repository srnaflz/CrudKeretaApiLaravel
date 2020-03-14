<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kasir extends Model
{
    //
    
    public $fillable = ['harga','id_pembeli'];
    public $timestamps = true;

    public function pembeli()
    {
        return $this->belongsTo('App\Pembeli','id_pembeli');
    }
    public function kelas()
    {
        return $this->hasOne('App\Kelas','id_kasir');
    }
}
