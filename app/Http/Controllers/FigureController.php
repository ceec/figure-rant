<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\Figure;

use App\FigureDB;
use App\Group;
use App\Character;
use App\Productline;
use App\Sculptor;
use App\Manufacturer;
use App\Scale;

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
        $f->scale_id = 1;
        $f->manufacturer_id = 1;
        $f->productline_id = 1;
        $f->item_number = 0;
        $f->group_id = 1;
        $f->character_id = 1;
        $f->sculptor_id = 1;
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
        $f->updated_by = Auth::id();  
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

            //need to pull lists for everything!
            $groups = Group::orderBy('name','ASC')->pluck('name','id');
            $characters = Character::orderBy('name','ASC')->pluck('name','id');
            $sculptors = Sculptor::orderBy('name','ASC')->pluck('name','id');
            $scales = Scale::orderBy('name','ASC')->pluck('name','id');
            $manufacturers = Manufacturer::orderBy('name','ASC')->pluck('name','id');
            $productlines = Productline::orderBy('name','ASC')->pluck('name','id');

            ///add the 0 Unknown placeholders
           // $collections = [$groups,$characters,$sculptors,$scales,$manufacturers,$productlines];

            // foreach($collections as $collection) {
            //     $collection->prepend('Unknown',0);
            // }
           
            

            return view('home.figureEdit')
            ->with('groups',$groups)
            ->with('characters',$characters)
            ->with('sculptors',$sculptors)
            ->with('scales',$scales)
            ->with('manufacturers',$manufacturers)
            ->with('productlines',$productlines)
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
        // $up->url = $request->input('url');
        //$up->extended = $request->input('released');
        $up->released = $request->input('released');
        $up->scale_id = $request->input('scale_id');
        $up->manufacturer_id = $request->input('manufacturer_id');
        $up->productline_id = $request->input('productline_id');
        $up->item_number = $request->input('item_number');
        $up->group_id = $request->input('group_id');
        $up->character_id = $request->input('character_id');
        $up->sculptor_id = $request->input('sculptor_id');

        //check for empty dates
        $announce_date = $request->input('announce_date');
        $seen_date = $request->input('seen_date');
        $available_date = $request->input('available_date');
        $available_release_date = $request->input('available_release_date');
        $release_date = $request->input('release_date');

        if ($announce_date == '') {
            $announce_date = '2000-1-01';
        }

        if ($seen_date == '') {
            $seen_date = '2000-1-01';
        }

        if ($available_date == '') {
            $available_date = '2000-1-01';
        }

        if ($available_release_date == '') {
            $available_release_date = '2000-1-01';
        }

        if ($release_date == '') {
            $release_date = '2000-1-01';
        }        
        
        $up->announce_date = $announce_date;
        $up->seen_date = $seen_date;
        $up->available_date = $available_date;
        $up->available_release_date = $available_release_date;
        $up->release_date = $release_date;
        $up->price = $request->input('price');
        //$up->height = $request->input('height');
        $up->url = $request->input('url');
        //$up->amazon = $request->input('amazon');
        //$up->description = $request->input('description');
        $up->manufacturer_url = $request->input('manufacturer_url');
        //$up->amiami_id = $request->input('amiami_id');
        //$up->mandarake_id = $request->input('mandarake_id');      
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


    /////user stuff???
    /**
     * Check if the user has that figure
     *
     * @return bool
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


}
