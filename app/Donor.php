<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    public function pendonor()
    {
    	return $this->belongsTo('App\Pendonor');
    }
}
