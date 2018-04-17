<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\FigureDB;
use App\Group;
use Auth;
use App\Orderfigure;


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

       //figure out the folder
       if ($figure->productline->name == 'Nendoroid') {
          $image_folder = 'nendoroids';
       } else {
          $image_folder = 'scales';
       }
        

       $figurecheck = self::figureChecK($figure->id);

        return view('display.figure')
					->with('figure',$figure)
					->with('image_folder',$image_folder)
          ->with('figurecheck',$figurecheck);
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
      $check = Orderfigure::where('user_id','=',$user->id)->where('figure_id','=',$figure_id)->count();

      if ($check > 0 ) {
        $result = true;
      } else {
        $result = false;
      }

      return $result;
    }     


}
