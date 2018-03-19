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

        //do this 900 times

        // for ($i = 13; $i<=900; $i++) {
        //     //get last inserted ID
        //     $last_figure = FigureDB::orderBy('id', 'desc')->first();

        //     $next_id = $last_figure->id + 1;

        //     $f = new FigureDB();
        //     $f->name = 'Nendoroid '.$next_id;
        //     $f->extended = '';
        //     $f->released = 1;
        //     $f->scale_id = 0;
        //     $f->manufacturer_id = 1;
        //     $f->productline_id = 1;
        //     $f->item_number = $next_id;
        //     $f->group_id = 0;
        //     $f->character_id = 0;
        //     $f->sculptor_id = 0;
        //     $f->announce_date = "2018-01-01";
        //     $f->available_date = "2018-01-01";
        //     $f->release_date = "2018-01-01";
        //     $f->price = 0;
        //     $f->height = '';
        //     $f->url = '';
        //     $f->amazon = '';
        //     $f->description = '';
        //     $f->amiami_id = '';
        //     $f->mandarake_id = '';
        //     $f->updated_by = 1;
        //     $f->save();
        // }



    }  






}
