<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderfigure extends Model
{
        /**
     * Get the figures.
     */
    // public function figures()
    // {
    //     return $this->belongsToMany('App\FigureDB','orderfigures','order_id','figure_id');
    // }



    public function figure() {
        return $this->belongsTo('App\FigureDB');
    }
}
