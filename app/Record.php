<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Device;

class Record extends Model
{
    //
    public function deviceInfo(){
        return $this->hasOne('App\Device','custom_id', 'device')->where('user_id', $this->user_id);
    }
}
