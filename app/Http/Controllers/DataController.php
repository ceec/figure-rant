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
        $orders = Order::where('arrival_date','!=','2000-01-01')->where('arrival_date','!=','1900-01-01')->orderBy('order_date','asc')->get();

        //break into gannts
        $data = [];
        foreach($orders as $order) {
            $chunk['category'] = $order->id;
            $chunk['start'] = $order->order_date;
            $chunk['end'] = $order->payment_date;
            $chunk['status'] = 'Pre-order';
            $data[] = $chunk;
            $chunk['category'] = $order->id;
            $chunk['start'] = $order->payment_date;
            $chunk['end'] = $order->shipment_date;
            $chunk['color'] = 'red';
            $chunk['status'] = 'Payment';
            $data[] = $chunk;  
            $chunk['category'] = $order->id;
            $chunk['start'] = $order->shipment_date;
            $chunk['end'] = $order->arrival_date;
            $chunk['color'] = 'green';
            $chunk['status'] = 'Shipped '.$order->shipment_type;
            $data[] = $chunk;                
            unset($chunk);        
        }




        print json_encode($data);
    }      

    /**
     * Pre-order to shipped time comparison
     *
     * @return \Illuminate\Http\Response
     */

    public static function figureyear() {
        //SELECT orders.*,orderfigures.* FROM orders JOIN orderfigures ON orders.id = orderfigures.order_id ORDER BY orders.arrival_date
        $figures = Order::join('orderfigures','orderfigures.order_id','=','orders.id')->orderBy('arrival_date','ASC')->get();

        $data = [];
        foreach($figures as $figure) {
            $month = date('m',strtotime($figure->arrival_date));
            $data[$month][] = substr($figure->arrival_date,0,4);


            // $chunk['category'] =  date('m',strtotime($figure->arrival_date));
            // $data[] = $chunk;                
            // unset($chunk);              
        }

        //sort the arrays by month
        ksort($data);

        //need to count how many per year, can probably do this WAY easier in SQL
        $finaldata = [];
        foreach($data as $key => $value) {
            $amount = array_count_values($value);
            $finaldata[$key]['amount'] = $amount;
            $finaldata[$key]['month'] = $key;
        }


        //somehow flatten just one of the arrays
        $superfinaldata = [];
        foreach($finaldata as $key => $value) {
            $yearcount = count($value['amount']);
            //var_dump($yearcount);
            foreach ($value['amount'] as $year => $amount) {
                $superfinaldata[$key][$year]= $amount;
            }
            $superfinaldata[$key]['month']= $key;
        }

        $extrasuperfinaldata = [];
        foreach($superfinaldata as $data) {
            $extrasuperfinaldata[] = $data;
        }
    
        print json_encode($extrasuperfinaldata);
    }



}
