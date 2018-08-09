<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $table = 'figures.characters';


       /**
     * Get the character.
     */
    public function figures()
    {
        return $this->hasMany('App\FigureDB');
    } 
}
