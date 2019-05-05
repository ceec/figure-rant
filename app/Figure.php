<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Figure extends Model
{
    public function figureDB() {
        return $this->belongsTo('App\FigureDB','figure_id');
    }

    public function totalHave() {
        return $this->where('status', '=',2)->count();
    }




}
