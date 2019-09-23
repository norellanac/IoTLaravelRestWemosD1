<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Device;

class Record extends Model
{
    //
    public function deviceInfo(){
        return $this->belongsTo("App\Device",'device');
    }
}
