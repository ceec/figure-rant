<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\Figure;
use App\Order;


class GraphController extends Controller
{

    /**
     * Order
     *
     * @return \Illuminate\Http\Response
     */
    public function figureyear() {

       //how many in total
      //  $total = FigureController::stats();


      //  $order = Order::find($order_id);
        return view('graphs.figureyear');
    } 

   
}
