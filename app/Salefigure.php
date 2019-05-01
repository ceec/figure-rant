<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salefigure extends Model
{

    public function figure() {
        return $this->belongsTo('App\Figure');
    }

}
