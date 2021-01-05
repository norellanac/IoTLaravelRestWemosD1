<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function status(){
		return $this->belongsTo('App\Status_company', 'status_id');
	}
}
