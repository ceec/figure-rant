<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Order;
use App\Store;
use App\Orderfigure;
use App\FigureDB;
use Auth;

class OrderController extends Controller {


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
     * Add  UI
     *
     * @return \Illuminate\Http\Response
     */
    public function addDisplay() {
            //need to get stores
            $stores = Store::pluck('name','id');



            return view('home.orderAdd')
            ->with('stores',$stores);
    } 

    /**
     * Add order
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request) {


        $n = new Order;
        $n->store_id = $request->input('store_id');
        $n->store_order_id = $request->input('store_order_id');
        $n->shipping_yen = 0;
        $n->total_yen = 0;
        $n->shipping_usd = 0;
        $n->total_usd = 0;
        $n->order_date = '2000-01-01';
        $n->payment_date = '2000-01-01';
        $n->shipment_date = '2000-01-01';
        $n->shipment_type = '';
        $n->tracking_number = '';
        $n->arrival_date = '2000-01-01';
        $n->updated_by = Auth::id();  
        $n->save();

        return redirect('/home/order/list');          
    } 


    /**
     * Add figure
     *
     * @return \Illuminate\Http\Response
     */
    public function addFigure(Request $request) {
        //get the user id
        $user = Auth::user();    

        $figure_id = $request->input('figure_id');

        $figure = FigureDB::find($figure_id);

        $n = new Orderfigure;
        $n->figure_id = $figure_id;
        $n->user_id = $user->id;
        $n->order_id = 0;
        $n->price_yen = 0;
        $n->price_usd = 0;
        $n->status = '';
        $n->updated_by = Auth::id();  
        $n->save();

        return redirect('/figure/'.$figure->url);          
    } 



   /**
     * Add figure to order, more of an update
     *
     * @return \Illuminate\Http\Response
     */
    public function editOrderFigure(Request $request) {
        //get the user id
        $user = Auth::user();    

        $order_figure_id = $request->input('order_figure_id');
        $order_id = $request->input('order_id');

        $price_yen = $request->input('price_yen');
        $price_usd = $request->input('price_usd');
        $status = $request->input('status');


        if ($price_yen == '') {
            $price_yen = 0;
        }
        if ($price_usd == '') {
            $price_usd = 0;
        }

        if ($status == '') {
            $status = '';
        }        
        
        $up = Orderfigure::find($order_figure_id);
        $up->order_id = $order_id;
        $up->price_yen = $price_yen;
        $up->price_usd = $price_usd;
        $up->status = $status;
        $up->updated_by = Auth::id();  
        $up->save();        

        return redirect('/home/order/edit/'.$order_id);              
    } 



      /**
     * Add figure to order, more of an update
     *
     * @return \Illuminate\Http\Response
     */
    public function removeOrderFigure(Request $request) {
        //get the user id
        $user = Auth::user();    

        $order_figure_id = $request->input('order_figure_id');
        $order_id = $request->input('order_id');

        $up = Orderfigure::find($order_figure_id);
        $up->order_id = '0';
        $up->updated_by = Auth::id();  
        $up->save();        

        return redirect('/home/order/edit/'.$order_id);              
    }  


    /**
     * List orders for eiting
     *
     * @return \Illuminate\Http\Response
     */
    public function listDisplay() {
            $orders = Order::orderBy('created_at','desc')->get();

            return view('home.orderList')
            ->with('orders',$orders);
    } 

    /**
     * UI for eding
     *
     * @return \Illuminate\Http\Response
     */
    public function editDisplay($order_id) {
            $order = Order::find($order_id);
            $stores = Store::pluck('name','id');

            $user = Auth::user(); 

            $newfigures = Orderfigure::where('user_id','=',$user->id)->where('order_id','=',0)->pluck('figure_id','id');

            $figures = Orderfigure::where('user_id','=',$user->id)->where('order_id','=',$order_id)->get();

            return view('home.orderEdit')
            ->with('stores',$stores)
            ->with('newfigures',$newfigures)
            ->with('figures',$figures)
            ->with('order',$order);
    } 


    /**
     * Edit order
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        $order_id = $request->input('order_id');

        $up = Order::find($order_id);
        $up->store_id = $request->input('store_id');
        $up->store_order_id = $request->input('store_order_id');
        $up->shipping_yen = $request->input('shipping_yen');
        $up->total_yen = $request->input('total_yen');
        $up->shipping_usd = $request->input('shipping_usd');
        $up->total_usd = $request->input('total_usd');
        $up->order_date = $request->input('order_date');
        $up->payment_date = $request->input('payment_date');
        $up->shipment_date = $request->input('shipment_date');
        $up->shipment_type = $request->input('shipment_type');
        $up->tracking_number = $request->input('tracking_number');
        $up->arrival_date = $request->input('arrival_date');
        $up->updated_by = Auth::id();  
        $up->save();

        return redirect('/home/order/edit/'.$order_id);          
    } 


}
