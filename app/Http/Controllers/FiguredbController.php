<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\FigureDB;
use App\Group;
use Auth;
use App\Orderfigure;
use App\Character;
use App\Event;
use App\Good;
use App\Ordergood;
use App\Data;


//   class YourClassFactory {

//         private $_language;
//         private $_basename = 'yourclass';

//         public YourClassFactory($language) {
//             $this->_language = $language;
//         }

//         public function getYourClass() {
//             return $this->_basename . '_' . $this->_language;
//         }    
//     } 


//     $yourClass = $yourClassFactoryInstance->getYourClass();
//     $yourClass::myFunctionName();   

class FiguredbController extends Controller
{

     /**
     * Figures
     *
     * @return \Illuminate\Http\Response
     */
    public function figure($url) {

       $figure = FigureDB::where('url','=',$url)->first();
        

       $figurecheck = self::figureChecK($figure->id);

        return view('display.figure')
					->with('figure',$figure)
          ->with('figurecheck',$figurecheck);
		}
    
        
     /**
     * Goods
     *
     * @return \Illuminate\Http\Response
     */
    public function good($url) {

       $good = Good::where('url','=',$url)->first();
        

       $goodcheck = self::goodChecK($good->id);

        return view('display.good')
		    ->with('good',$good)
          ->with('goodcheck',$goodcheck);
		}        


    /**
     * Display figure category
     *
     * @return \Illuminate\Http\Response
     */
    public function displayCategory($category,$url) {
			//category will be character/group/sculptor
        //$group_id = self::getIdFromParameter('group',$url);
				//get the group id from the url, what did i use on enstars
				$original_category = $category;

				$type = self::checkParameter($url);

        $category = ucfirst($category);
        
        //handle spaces
        $category = str_replace('-','',$category);
        $original_category = str_replace('-','',$original_category);

				//https://stackoverflow.com/questions/7131295/dynamic-class-names-in-php
        $category = '\App\\'.$category;		
        //2018-11-26 20:40 this is giving a php error when random urls are passed to it
        try { 
				  $group = $category::where($type,'=',$url)->first();
        } catch (\Throwable $ex) {
          abort(404); 
        }
        //$group = Group::where($type,'=',$url)->first();

       $figures = FigureDB::where($original_category.'_id','=',$group->id)->get();

        return view('display.figures')
          ->with('figures',$figures);
    }





    /**
     * Groups
     *
     * @return \Illuminate\Http\Response
     */
    public function group($url) {
        //$group_id = self::getIdFromParameter('group',$url);
        //get the group id from the url, what did i use on enstars

        $type = self::checkParameter($url);

        $group = Group::where($type,'=',$url)->first();

       $figures = FigureDB::where('group_id','=',$group->id)->get();

        return view('display.figures')
          ->with('figures',$figures);
    }


    /**
     * Groups
     *
     * @return \Illuminate\Http\Response
     */
    public function character($url) {
        //$group_id = self::getIdFromParameter('group',$url);
        //get the group id from the url, what did i use on enstars

				$type = self::checkParameter($url);
				
				$model = 'Character';

				$model = new Character;
				$group = $model->where($type,'=',$url)->first();

        //$group = $model::where($type,'=',$url)->first();

       $figures = FigureDB::where('character_id','=',$group->id)->get();

        return view('display.figures')
          ->with('figures',$figures);
    }



        //can pass through an id or an url
        // if (ctype_digit($classroom_id)){
        //     $classroom = Classroom::where('id','=',$classroom_id)->first();
        // } else {
        //     $classroom = Classroom::where('url','=',$classroom_id)->first();
        // }


        //ok a factory?
        //2018-04-13
        //okay having all the issues using variables.
        
            protected function checkParameter($parameter) {
                if (ctype_digit($parameter)){
                    $type = 'id';
                } else {
                    $type = 'url';
                }

                return $type;
            }


    
    //helper function, okay this was too lofty a goal
    protected function getIdFromParameter($type,$parameter) {
        //can pass through an id or an url
        $classname = ucfirst($type);

        if (ctype_digit($parameter)){
            $result = $classname::where('id','=',$parameter)->first();

        } else {
            $result = $classname::where('url','=',$parameter)->first();
            dd($classname);
            //$result = Group::where('url','=',$parameter)->first();
        }

        return $result;
    }



      /**
     * Ghetto tools for now!
     *
     * @return \Illuminate\Http\Response
     */

    public static function addNendos() {

        //do this 900 times

        // for ($i = 13; $i<=900; $i++) {
        //     //get last inserted ID
        //     $last_figure = FigureDB::orderBy('id', 'desc')->first();

        //     $next_id = $last_figure->id + 1;

        //     $f = new FigureDB();
        //     $f->name = 'Nendoroid '.$next_id;
        //     $f->extended = '';
        //     $f->released = 1;
        //     $f->scale_id = 0;
        //     $f->manufacturer_id = 1;
        //     $f->productline_id = 1;
        //     $f->item_number = $next_id;
        //     $f->group_id = 0;
        //     $f->character_id = 0;
        //     $f->sculptor_id = 0;
        //     $f->announce_date = "2018-01-01";
        //     $f->available_date = "2018-01-01";
        //     $f->release_date = "2018-01-01";
        //     $f->price = 0;
        //     $f->height = '';
        //     $f->url = '';
        //     $f->amazon = '';
        //     $f->description = '';
        //     $f->amiami_id = '';
        //     $f->mandarake_id = '';
        //     $f->updated_by = 1;
        //     $f->save();
        // }



    }  


    ///user check???
    /////user stuff???
    /**
     * Check if the user has that figure
     *
     * @return bool
     */
    private function figureCheck($figure_id) {
			$user= Auth::user();    

			if (!isset($user->id)) {
				return false;
			}


      $check = Orderfigure::where('user_id','=',$user->id)->where('figure_id','=',$figure_id)->count();

      if ($check > 0 ) {
        $result = true;
      } else {
        $result = false;
      }

      return $result;
    }     

    /**
     * Check if the user has that good
     *
     * @return bool
     */
    private function goodCheck($good_id) {
			$user= Auth::user();    

			if (!isset($user->id)) {
				return false;
			}


      $check = Ordergood::where('user_id','=',$user->id)->where('good_id','=',$good_id)->count();

      if ($check > 0 ) {
        $result = true;
      } else {
        $result = false;
      }

      return $result;
    } 


    ///2018-08-09 figure round up
    /**
     * Groups
     *
     * @return \Illuminate\Http\Response
     */
    public function roundup($group_url) {
        //get all the figures for that group.

        $group = Group::where('url','=',$group_url)->first();
        $characters = Character::where('group_id','=',$group->id)->get();

        $figures = Figuredb::where('group_id','=',$group->id)->get();

        return view('display.roundup')
          ->with('characters',$characters)
          ->with('figures',$figures);
    }    

}
