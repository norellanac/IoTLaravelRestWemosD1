<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Device extends Model
{
    //
    public function user(){
        return $this->belongsTo("App\User",'user_id');
    }
}
