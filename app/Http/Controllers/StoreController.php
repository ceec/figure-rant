<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Store;

use Auth;

class StoreController extends Controller {


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


            return view('home.storeAdd');
    } 

    /**
     * Add store
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request) {

        $n = new Store;
        $n->name = $request->input('name');
        $n->updated_by = Auth::id();  
        $n->save();

        return redirect('/home/store/list');          
    } 


    /**
     * List stores for eiting
     *
     * @return \Illuminate\Http\Response
     */
    public function listDisplay() {
            $stores = Store::orderBy('created_at','desc')->get();

            return view('home.storeList')
            ->with('stores',$stores);
    } 

    /**
     * UI for eding
     *
     * @return \Illuminate\Http\Response
     */
    public function editDisplay($store_id) {
            $store = Store::find($store_id);

            return view('home.storeEdit')
            ->with('store',$store);
    } 


    /**
     * Edit store
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        $store_id = $request->input('store_id');

        $up = Store::find($store_id);
        $up->name = $request->input('name');
        $up->updated_by = Auth::id();  
        $up->save();

        return redirect('/home/store/edit/'.$store_id);          
    } 


}
