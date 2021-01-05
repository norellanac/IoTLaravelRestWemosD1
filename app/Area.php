<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public function status(){
		return $this->belongsTo('App\Status_area', 'status_id');
	}
	public function companies(){
		return $this->belongsTo('App\Company', 'company_id');
	}
}
