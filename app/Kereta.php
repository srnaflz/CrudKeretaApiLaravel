<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kereta extends Model
{
    //
    protected $fillable = ['kereta','jm_berangkat','jm_tiba','dari','ke'];
    public $timestamps = true;

    public function pembeli()
    {
        return $this->hasMany('App\Pembeli','id_kereta');
    }

}
