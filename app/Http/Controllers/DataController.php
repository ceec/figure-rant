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

        foreach($orders as $order) {
            $order->rate = $order->total_yen / $order->total_usd;

        }

        print json_encode($orders);
    }  



      /**
     * Get orders by year
     *
     * @return \Illuminate\Http\Response
     */

    public static function totalorders() {
        $orders = Order::orderBy('order_date','asc')->get();

        foreach($orders as $order) {
            //need to normalize yen vs usd

            if ($order->total_usd != 0.00) {
                //its usd
                $order->items = round(($order->total_usd - $order->shipping_usd) / $order->total_usd,2);
                $order->shipping = round($order->shipping_usd / $order->total_usd,2);
            } else {
                if ($order->total_yen != 0) {
                    //its yen
                    $order->items = round(($order->total_yen - $order->shipping_yen) / $order->total_yen,2);
                    $order->shipping = round($order->shipping_yen / $order->total_yen,2);                      
                }
              
            }


        }


        print json_encode($orders);
    }  


    /**
     * Pre-order to shipped time comparison
     *
     * @return \Illuminate\Http\Response
     */

    public static function shiptime() {
        $orders = Order::where('shipment_date','!=','2000-01-01')->orderBy('order_date','asc')->get();

        //break into gannts
        $data = [];
        foreach($orders as $order) {
            $chunk['category'] = $order->id;
            $chunk['start'] = $order->order_date;
            $chunk['end'] = $order->payment_date;
            $data[] = $chunk;
        }




        print json_encode($data);
    }      
}
