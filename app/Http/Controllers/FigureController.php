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

    public static function total() {
        $amount = Figure::all()->count();

        return $amount;
    }


}
