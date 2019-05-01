<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Sale;
use App\Salefigure;
use App\Ordergood;

use Auth;

class SaleController extends Controller {


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


            return view('home.saleAdd');
    } 

    /**
     * Add sale
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request) {

        $s = new Sale;
        $s->shipping_usd = $request->input('shipping_usd');
        $s->total_usd = $request->input('total_usd');
        $s->updated_by = Auth::id();  
        $s->save();

        return redirect('/home/sale/list');          
    } 


    /**
     * List sales for eiting
     *
     * @return \Illuminate\Http\Response
     */
    public function listDisplay() {
            $sales = Sale::orderBy('created_at','desc')->get();

            return view('home.saleList')
            ->with('sales',$sales);
    } 

    /**
     * UI for eding
     *
     * @return \Illuminate\Http\Response
     */
    public function editDisplay($sale_id) {
            $sale = Sale::find($sale_id);
            
            $user = Auth::user(); 

            $figures = Salefigure::where('sale_id','=',$sale_id)->get();

            $newfigures = Salefigure::where('sale_id','=',0)->pluck('figure_id','id');
            
            foreach($newfigures as $key => $figure) {
                //get the figure name-> this can probably be a join
                $figure_name = FigureDB::find($figure);
                $newfigures[$key] = $figure." - ".$figure_name->name;
            }            

            return view('home.saleEdit')
            ->with('figures',$figures)
            ->with('newfigures',$newfigures)
            ->with('sale',$sale);
    } 


    /**
     * Edit sale
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        $sale_id = $request->input('store_id');

        $up = Sale::find($sale_id);
        $up->name = $request->input('name');
        $up->updated_by = Auth::id();  
        $up->save();

        return redirect('/home/sale/edit/'.$sale_id);          
    } 


}
