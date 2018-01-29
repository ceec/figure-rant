<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Figure extends Model
{
        /**
     * Get the group.
     */
    public function group()
    {
        return $this->belongsTo('App\Group');
    }


    //  /**
    //  * Get the group.
    //  */
    // public function group()
    // {
    //     return $this->belongsTo('App\Group');
    // }

}
