<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    //
    public function deviceInfo()
    {
        return $this->hasOne('App\Device', 'custom_id', 'device')->where('user_id', $this->user_id);
    }

    public function battery()
    {
        $valBat = round(($this->number3 - 2.7) * 59);

        if ($valBat < 0) {
            $valBat = 0;
        }
        if ($valBat > 100) {
            $valBat = 100;
        }

        if ($valBat <= 15) {
            $arrayBat = array(
                "Value" => $valBat,
                "class" => "danger",
            );
        }

        if ($valBat > 15 && $valBat<= 50) {
            $arrayBat = array(
                "Value" => $valBat,
                "class" => "warning",
            );
        }

        if ($valBat > 50 ) {
            $arrayBat = array(
                "Value" => $valBat,
                "class" => "success",
            );
        }

        return $arrayBat;
    }
}
