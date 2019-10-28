<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Sale;
use App\Salefigure;
use App\Ordergood;
use App\Figure;
use App\FigureDB;

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

            //SELECT figures.* FROM figures left join salefigures on figures.id = salefigures.figure_id WHERE figures.status=3 AND salefigures.figure_id IS NULL
            //okay now how to ORM that haha
            $newfigures = Figure::leftJoin('salefigures','figures.id','=','salefigures.figure_id')->where('figures.status','=','3')->whereNull('salefigures.figure_id')->pluck('figures.figure_id','figures.id');
            
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
        $sale_id = $request->input('sale_id');

        $s = Sale::find($sale_id);
        $s->shipping_usd = $request->input('shipping_usd');
        $s->total_usd = $request->input('total_usd');
        $s->updated_by = Auth::id();  
        $s->save();

        return redirect('/home/sale/edit/'.$sale_id);          
    } 




    /**
     * Add figure
     *
     * @return \Illuminate\Http\Response
     */
    public function addSaleFigure(Request $request) {
        //get the user id
        $user = Auth::user();    

        $figure_id = $request->input('sale_figure_id');
        $sale_id = $request->input('sale_id');

        $figure = FigureDB::find($figure_id);

        $n = new Salefigure;
        $n->figure_id = $figure_id;
        //$n->user_id = $user->id;
        $n->sale_id = $sale_id;
        $n->price_usd = 0;
        $n->updated_by = Auth::id();  
        $n->save();

        return redirect('/home/sale/edit/'.$sale_id);      
    } 



   /**
     * Add figure to sale, more of an update
     *
     * @return \Illuminate\Http\Response
     */
    public function editSaleFigure(Request $request) {
        //get the user id
        $user = Auth::user();    

        $sale_figure_id = $request->input('sale_figure_id');
        $sale_id = $request->input('sale_id');

        $price_usd = $request->input('price_usd');

        if ($price_usd == '') {
            $price_usd = 0;
        }

        $s = Salefigure::find($sale_figure_id);
        $s->sale_id = $sale_id;
        $s->price_usd = $price_usd;
        $s->updated_by = Auth::id();  
        $s->save();        

        return redirect('/home/sale/edit/'.$sale_id);              
    } 

      /**
     * Add figure to sale, more of an update
     *
     * @return \Illuminate\Http\Response
     */
    public function removeSaleFigure(Request $request) {
        //get the user id
        $user = Auth::user();    

        $sale_figure_id = $request->input('sale_figure_id');
        $sale_id = $request->input('sale_id');

        $up = Salefigure::find($sale_figure_id);
        $up->delete();        

        return redirect('/home/sale/edit/'.$sale_id);              
    } 


}
