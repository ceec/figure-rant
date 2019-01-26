<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Scale;

use Auth;

class ScaleController extends Controller {


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


            return view('home.scaleAdd');
    } 

    /**
     * Add scale
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request) {

        $n = new Scale;
        $n->name = $request->input('name');
        $n->url = $request->input('url');
        $n->updated_by = Auth::id();  
        $n->save();

        return redirect('/home/scale/list');          
    } 


    /**
     * List scales for eiting
     *
     * @return \Illuminate\Http\Response
     */
    public function listDisplay() {
            $scales = Scale::orderBy('created_at','desc')->get();

            return view('home.scaleList')
            ->with('scales',$scales);
    } 

    /**
     * UI for eding
     *
     * @return \Illuminate\Http\Response
     */
    public function editDisplay($scale_id) {
            $scale = Scale::find($scale_id);

            return view('home.scaleEdit')
            ->with('scale',$scale);
    } 


    /**
     * Edit scale
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        $scale_id = $request->input('store_id');

        $up = Scale::find($scale_id);
        $up->name = $request->input('name');
        $up->updated_by = Auth::id();  
        $up->save();

        return redirect('/home/scale/edit/'.$scale_id);          
    } 


}
