<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FigureDB extends Model
{
    protected $table = 'figures.figures';


    /**
     * Get the group.
     */
    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    /**
     * Get the character.
     */
    public function character()
    {
        return $this->belongsTo('App\Character');
    }

    /**
     * Get the manufacturer.
     */
    public function manufacturer()
    {
        return $this->belongsTo('App\Manufacturer');
    }

    /**
     * Get the productline.
     */
    public function productline()
    {
        return $this->belongsTo('App\Productline');
    }

    /**
     * Get the sculptor.
     */
    public function sculptor()
    {
        return $this->belongsTo('App\Sculptor');
    }

    /**
     * Get the scale.
     */
    public function scale()
    {
        return $this->belongsTo('App\Scale');
    }   
    
    /**
     * Get the orderfigure?.
     */
    public function orders()
    {
        return $this->belongsToMany('App\FigureDB','orderfigures','order_id','figure_id');
    }    

    /**
     * Get the folder type.
     */
    public function imageFolder()
    {
       if ( ($this->productline->name == 'Nendoroid') || ($this->productline->name == 'Nendoroid Co-de') ) {
          $image_folder = 'nendoroids';
       } else if ($this->productline->name == 'figma') {
           $image_folder = 'figma';
       } else {
          $image_folder = 'scales';
       }

       return $image_folder;
    }   


    /**
     * Get the status.
     */
    public function status()
    {
        return $this->belongsTo('App\Status');
    }

}
