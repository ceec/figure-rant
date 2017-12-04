<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\Figure;
use App\Order;


class DataController extends Controller
{



      /**
     * Get total amount of figures
     *
     * @return \Illuminate\Http\Response
     */

    public static function yenusd() {
        $orders = Order::where('total_usd','!=',0)->where('total_yen','!=',0)->orderBy('payment_date','asc')->get();

        print json_encode($orders);
    }  



}
