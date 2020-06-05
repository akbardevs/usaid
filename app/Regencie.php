<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regencie extends Model

{
     public function pendonor() { 
      return $this->hasOne('App\Pendonor'); 
    }
    protected $table = 'regencies';
}
