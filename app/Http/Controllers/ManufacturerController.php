<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Manufacturer;

use Auth;

class ManufacturerController extends Controller {


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


            return view('home.manufacturerAdd');
    } 

    /**
     * Add manufacturer
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request) {

        $m = new Manufacturer;
        $m->name = $request->input('name');
        $m->class = '';
        $m->url = $request->input('url');
        $m->updated_by = Auth::id();  
        $m->save();

        return redirect('/home/manufacturer/list');          
    } 


    /**
     * List manufacturers for editing
     *
     * @return \Illuminate\Http\Response
     */
    public function listDisplay() {
            $manufacturers = Manufacturer::orderBy('created_at','desc')->get();

            return view('home.manufacturerList')
            ->with('manufacturers',$manufacturers);
    } 

    /**
     * UI for eding
     *
     * @return \Illuminate\Http\Response
     */
    public function editDisplay($manufacturer_id) {
            $manufacturer = Manufacturer::find($manufacturer_id);

            return view('home.manufacturerEdit')
            ->with('manufacturer',$manufacturer);
    } 


    /**
     * Edit manufacturer
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        $manufacturer_id = $request->input('manufacturer_id');

        $up = Manufacturer::find($manufacturer_id);
        $up->name = $request->input('name');
        $up->updated_by = Auth::id();  
        $up->save();

        return redirect('/home/manufacturer/edit/'.$manufacturer_id);          
    } 


}
