<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    /**
     * Get the figures.
     */
    public function salefigures()
    {
        return $this->hasMany('App\Salefigure');
    }  
}
