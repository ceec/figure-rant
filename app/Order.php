<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
        /**
     * Get the figures.
     */
    public function figures()
    {
        return $this->hasMany('App\Figure');
    }


        /**
     * Get the figures.
     */
    public function figuredbs()
    {
        return $this->hasMany('App\FigureDB');
    }    

        /**
     * Get the store.
     */
    public function store()
    {
        return $this->belongsTo('App\Store');
    }


    /**
     * Get the figures.
     */
    public function orderfigures()
    {
        return $this->hasMany('App\Orderfigure');
    }  


}
