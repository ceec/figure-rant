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
    public function add(Request $request) {

        $this->validate($request, [
        'name' => 'unique:figures.sculptors',
        ]);

        $n = new Sculptor;
        $n->name = $request->input('name');
        $n->url = $request->input('url');
        $n->updated_by = Auth::id();  
        $n->save();

        return redirect('/home/sculptor/list');          
    } 



    /**
     * Edit user figure
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        $figure_id = $request->input('figure_id');
        $figuredb_id = $request->input('figuredb_id');

        $e = Figure::find($figure_id);
        $e->status = $request->input('status');
        $e->updated_by = Auth::id();  
        $e->save();

        // Get the url for the redirect, could make a db call or pass it through?
        $figure = FigureDB::where('id','=',$figuredb_id)->first();


        return redirect('/figure/'.$figure->url);          
    } 

}
