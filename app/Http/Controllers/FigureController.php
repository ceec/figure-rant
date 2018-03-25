<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\Figure;
use App\FigureDB;

use Auth;


class FigureController extends Controller
{
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
     * Add figure  UI
     *
     * @return \Illuminate\Http\Response
     */
    public function addDisplay() {


            return view('home.figureAdd');
    } 


    /**
     * Add figure
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request) {

        $f = new FigureDB;
        $f->name = $request->input('name');
        $f->extended = '';
        $f->released = 0;
        $f->scale_id = 0;
        $f->manufacturer_id = 0;
        $f->productline_id = 0;
        $f->item_number = '';
        $f->group_id = 0;
        $f->character_id = 0;
        $f->sculptor_id = 0;
        $f->announce_date = '2018-01-01';
        $f->seen_date = '2018-01-01';
        $f->available_date = '2018-01-01';
        $f->available_release_date = '2018-01-01';
        $f->release_date = '2018-01-01';
        $f->price = 0;
        $f->height = '';
        $f->url = $request->input('url');
        $f->amazon = '';
        $f->description = '';
        $f->manufacturer_url = '';
        $f->amiami_id = '';
        $f->mandarake_id = '';
        $f->updated_by = 1;  
        $f->save();


        return redirect('/home');          
    } 



    /**
     * List figures for eiting
     *
     * @return \Illuminate\Http\Response
     */
    public function listDisplay() {
            $figures = FigureDB::orderBy('id','desc')->get();

            return view('home.figureList')
            ->with('figures',$figures);
    } 




    /**
     * UI for eding
     *
     * @return \Illuminate\Http\Response
     */
    public function editDisplay($figure_id) {
            $figure = FigureDB::find($figure_id);

            return view('home.figureEdit')
            ->with('figure',$figure);
    } 


    /**
     * Edit figure
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        $figure_id = $request->input('figure_id');

        $up = FigureDB::find($figure_id);
        $up->name = $request->input('name');
        $up->url = $request->input('url');
        $up->released = $request->input('released');
        $up->updated_by = Auth::id();  
        $up->save();


        return redirect('/home/figure/edit/'.$figure_id);          
    } 



      /**
     * Get total amount of figures
     *
     * @return \Illuminate\Http\Response
     */

    public static function stats() {
        $stats['total'] = Figure::all()->count();
        $stats['preorders'] = Figure::where('status_id','=','3')->count();
        $stats['nendos'] = Figure::where('productline_id','=','1')->count();
        $stats['sayakas'] = Figure::where('character_id','=','4')->count();
        $stats['choppers'] = Figure::where('character_id','=','329')->count();        
        return $stats;
    }  



}
