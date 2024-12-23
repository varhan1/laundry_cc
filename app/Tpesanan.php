<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tpesanan extends Model
{
    //
    public $incrementing = false;
 
    public function customers(){
        return $this->belongsTo('App\Customer','customer','id');
    }
 
    public function pakets(){
        return $this->belongsTo('App\Paket','paket','id');
    }
 
    public function statuspesanans(){
        return $this->belongsTo('App\Statuspesanan','statuspesanan','id');
    }
 
    public function statuspembayarans(){
        return $this->belongsTo('App\Statuspembayaran','statuspembayaran','id');
  	}
}
