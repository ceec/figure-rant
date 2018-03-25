<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Group;

use Auth;

class GroupController extends Controller {


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


            return view('home.groupAdd');
    } 

    /**
     * Add group
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request) {

        $n = new Group;
        $n->name = $request->input('name');
        $n->japanese_name = '';
        $n->parent_id = '';
        $n->url = $request->input('url');
        $n->updated_by = Auth::id();  
        $n->save();

        return redirect('/home/group/list');          
    } 


    /**
     * List groups for eiting
     *
     * @return \Illuminate\Http\Response
     */
    public function listDisplay() {
            $groups = Group::orderBy('created_at','desc')->get();

            return view('home.groupList')
            ->with('groups',$groups);
    } 

    /**
     * UI for eding
     *
     * @return \Illuminate\Http\Response
     */
    public function editDisplay($group_id) {
            $group = Group::find($group_id);

            return view('home.groupEdit')
            ->with('group',$group);
    } 


    /**
     * Edit group
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        $group_id = $request->input('group_id');

        $up = Group::find($group_id);
        $up->name = $request->input('name');
        //$up->japanese_name = '';
        //$up->parent_id = '';
        $up->url = $request->input('url');
        $up->updated_by = Auth::id();  
        $up->save();

        return redirect('/home/group/edit/'.$group_id);          
    } 


}
