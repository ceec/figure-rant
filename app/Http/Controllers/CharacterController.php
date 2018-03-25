<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Character;
use App\Group;

use Auth;

class CharacterController extends Controller {


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
            //get groups
            $groups = Group::orderBy('name','ASC')->pluck('name','id');

            $groups->prepend('Unknown',0);

            return view('home.characterAdd')
            ->with('groups',$groups);
    } 

    /**
     * Add character
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request) {

        $n = new Character;
        $n->name = $request->input('name');
        $n->japanese_name = '';
        $n->group_id = $request->input('group_id');
        $n->url = $request->input('url');
        $n->updated_by = Auth::id();  
        $n->save();

        return redirect('/home/character/list');          
    } 


    /**
     * List characters for eiting
     *
     * @return \Illuminate\Http\Response
     */
    public function listDisplay() {
            $characters = Character::orderBy('created_at','desc')->get();

            return view('home.characterList')
            ->with('characters',$characters);
    } 

    /**
     * UI for eding
     *
     * @return \Illuminate\Http\Response
     */
    public function editDisplay($character_id) {
            $character = Character::find($character_id);
            //get groups
            $groups = Group::orderBy('name','ASC')->pluck('name','id');       
            $groups->prepend('Unknown',0);     

            return view('home.characterEdit')
            ->with('groups',$groups)
            ->with('character',$character);
    } 


    /**
     * Edit character
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        $character_id = $request->input('character_id');

        $up = Character::find($character_id);
        $up->name = $request->input('name');
        //$up->japanese_name = '';
        $up->group_id = $request->input('group_id');
        $up->url = $request->input('url');
        $up->updated_by = Auth::id();  
        $up->save();

        return redirect('/home/character/edit/'.$character_id);          
    } 


}
