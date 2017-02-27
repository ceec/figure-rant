<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\Figure;


class FigureController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



      /**
     * Get total amount of figures
     *
     * @return \Illuminate\Http\Response
     */

    public static function stats() {
        $stats['total'] = Figure::all()->count();
        $stats['preorders'] = Figure::where('status_id','=','3')->count();
        $stats['nendos'] = Figure::where('productline_id','=','1')->count();
        $stats['sayakas'] = Figure::where('character_id','=','4')->count();
        $stats['choppers'] = Figure::where('character_id','=','329')->count();        
        return $stats;
    }  



}
