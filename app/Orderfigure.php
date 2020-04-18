<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderfigure extends Model
{

    public function userfigure() {
        return $this->belongsTo('App\Figure','figure_id');
    }

}
