<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Sculptor;
use App\Orderfigure;
use App\Figure;
use App\FigureDB;


class UserfigureController extends Controller {


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
     * Check if the user has that figure
     *
     * @return \Illuminate\Http\Response
     */
    private function figureCheck($figure_id) {
      $user= Auth::user();    

      $check = Figure::where('user_id','=',$user->id)->where('figure_id','=',$figure_id)->count();

      //$check = Orderfigure::where('user_id','=',$user->id)->where('figure_id','=',$figure_id)->count();

      if ($check > 0 ) {
        $result = true;
      } else {
        $result = false;
      }

      return $result;
    } 


    /**
     * Add user figure
     *
     * @return \Illuminate\Http\Response
     */
    public function addFigure(Request $request) {
        // Get the user id
        $user = Auth::user();    
        
        $figuredb_id = $request->input('figure_id');

        // Create the figure entry to tie to to that user
        $f = new Figure;
        $f->user_id = $user->id;
        $f->figure_id = $figuredb_id;
        $f->status = 0;
        $f->price_yen = 0;
        $f->price_usd = 0;        
        $f->condition = '';
        $f->order_date = NULL;
        $f->updated_by = Auth::id();  
        $f->save();

        // Create an empty order figure entry
        $n = new Orderfigure;
        $n->figure_id = $f->id;
        // Placeholder will be deleted
        $n->figuredb_id = 0;
        $n->user_id = $user->id;
        // These will be moved to Figure
        $n->order_id = 0;
        $n->price_yen = 0;
        $n->price_usd = 0;
        $n->status = '';
        // 
        $n->updated_by = Auth::id();  
        $n->save();

        // Grab the url for the redirect
        $figuredb = FigureDB::find($figuredb_id);

        return redirect('/figure/'.$figuredb->url);          
    } 



    /**
     * Edit user figure
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        $figure_id = $request->input('figure_id');
        $figuredb_id = $request->input('figuredb_id');
        $order_date = $request->input('order_date');

        // Check for empty dates
        if ($order_date == '') {
          $order_date = NULL;
        }

        $e = Figure::find($figure_id);
        $e->status = $request->input('status');
        $e->price_yen = $request->input('price_yen');
        $e->price_usd = $request->input('price_usd');
        $e->condition = $request->input('condition');
        $e->order_date = $order_date;
        $e->updated_by = Auth::id();  
        $e->save();

        // Get the url for the redirect, could make a db call or pass it through?
        $figure = FigureDB::where('id','=',$figuredb_id)->first();

        // Two pages use this, the edit on the /figure and the edit on order edit
        if ($request->input('order_id') > 0) {
          return redirect('/home/order/edit/'.$request->input('order_id'));   
        } else {
          return redirect('/figure/'.$figure->url);        
        }
    } 

}
