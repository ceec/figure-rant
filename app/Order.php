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
     * Get the store.
     */
    public function store()
    {
        return $this->belongsTo('App\Store');
    }


}
