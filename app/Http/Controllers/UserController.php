<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Sculptor;
use App\Orderfigure;



class UserController extends Controller {


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
      $check = Orderfigure::where('user_id','=',$user->id)->where('figure_id','=',$figure_id)->count();

      if ($check > 0 ) {
        $result = true;
      } else {
        $result = false;
      }

      return $result;
    } 







    /**
     * Add  UI
     *
     * @return \Illuminate\Http\Response
     */
    public function addDisplay() {


            return view('home.sculptorAdd');
    } 

    /**
     * Add sculptor
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
     * List sculptors for eiting
     *
     * @return \Illuminate\Http\Response
     */
    public function listDisplay() {
            $sculptors = Sculptor::orderBy('created_at','desc')->get();

            return view('home.sculptorList')
            ->with('sculptors',$sculptors);
    } 

    /**
     * UI for eding
     *
     * @return \Illuminate\Http\Response
     */
    public function editDisplay($sculptor_id) {
            $sculptor = Sculptor::find($sculptor_id);

            return view('home.sculptorEdit')
            ->with('sculptor',$sculptor);
    } 


    /**
     * Edit sculptor
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        $sculptor_id = $request->input('sculptor_id');

        $up = Sculptor::find($sculptor_id);
        $up->name = $request->input('name');
        $up->url = $request->input('url');
        $up->updated_by = Auth::id();  
        $up->save();

        return redirect('/home/sculptor/edit/'.$sculptor_id);          
    } 


}
