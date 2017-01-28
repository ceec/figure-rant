<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
        /**
     * Get the event for this card.
     */
    public function order()
    {
          return $this->belongsTo('App\Order');
    }

}
