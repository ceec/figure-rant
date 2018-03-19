<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\FigureDB;


class FiguredbController extends Controller
{



      /**
     * Ghetto tools for now!
     *
     * @return \Illuminate\Http\Response
     */

    public static function addNendos() {

        //get last inserted ID
        $last_figure = FigureDB::orderBy('id', 'desc')->first();

        $next_id = $last_figure->id + 1;

        $f = new FigureDB();
        $f->name = 'Nendoroid '.$next_id;
        $f->released = 1;
        $f->scale_id = 0;
        $f->manufacturer_id = 1;
        $f->productline_id = 1;
        $f->item_number = $next_id;
        $f->group_id = 0;
        $f->character_id = 0;
        $f->sculptor_id = 0;
        $f->announce_date = '0000-00-00';
        $f->available_date = '0000-00-00';
        $f->release_date = '0000-00-00';
        $f->price = 0;
        $f->updated_by = 1;
        $f->save();

    }  






}
