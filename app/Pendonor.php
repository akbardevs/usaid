<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendonor extends Model
{
    public function province()
    {
    	return $this->belongsTo('App\Province','provinsi');
    }

    public function regencie()
    {
    	return $this->belongsTo('App\Regencie','regensi');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

     public function donor() { 
      return $this->hasMany('App\Donor'); 
    }
}
