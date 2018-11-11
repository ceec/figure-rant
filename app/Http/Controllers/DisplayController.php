<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Blogtagname;
use App\Figure;
use App\Collection;
use App\Order;
use App\Store;
use App\Nendoroid;
use App\Services\RssFeed;
use Suin\RSSWriter\Channel;
use Suin\RSSWriter\Feed;
use Suin\RSSWriter\Item;
use DB;

use App\FigureDB;

use App\Message;

class DisplayController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //random figure
       // $random_figure = FigureController::getRandomFigure();

    //get the tags
        //$tags = Blogtagname::orderBy(DB::raw('RAND()'))->take(10)->get();
        $tags = Blogtagname::all();

        //get the name of each tag
        foreach ($tags as $tag) {
            $name = Blogtagname::where('id','=',$tag->id)->first();
            $tag->name = $name->name;
        }



        $blogs = Blog::orderBy('created_at','desc')->where('active','=','1')->paginate(10);

       //how many in total
       $total = FigureController::stats();

        return view('welcome')
            ->with('tags',$tags)
            ->with('total',$total)
            ->with('blogs',$blogs);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function article($url) {
        $blog = Blog::where('url','=',$url)->first();
        //get the tags
        // $tags = Blogtag::where('blog_id','=',$thisblog->id)->get();
        // //get the figures
        // $figures = Blogfigure::where('blog_id','=',$thisblog->id)->get();

        // //get the name of each tag
        // foreach ($tags as $tag) {
        //     $name = Blogtagname::where('id','=',$tag->id)->first();
        //     $tag->name = $name->name;
        // }

        // //figure info
        // foreach ($figures as $figure) {
        //     $fig = Figure::where('id','=',$figure->figure_id)->first();
        //     $figure->name = $fig->name;
        //     $figure->url = $fig->url;
        // }

        //ghetto for now
        if ($blog->updated_by == 1) {
            $blog->author = 'CC';

        }

        //get a random blog post
        //$blog = new BlogController;
        //$random_blog = $blog->getRandomBlog();      

        //random figure
        //$random_figure = FigureController::getRandomFigure();

       //how many in total
       $total = FigureController::stats();        

        return view('display.blog')
            ->with('total',$total)          
            ->with('blog',$blog);
            //->with('figures',$figures)
            //->with('tags',$tags)
            //->with('random_figure',$random_figure)
            //->with('random_blog',$random_blog);     

    }


    /**
     * Display the about page
     *
     * @return \Illuminate\Http\Response
     */
    public function about() {
       //$collection = Collection::where('user_id','=',1)->figures;
       $scale18 = Figure::where('scale_id','=','1')->get();
       //get how many scales
       $amount18 = Figure::where('scale_id','=','1')->count();

       //17 scales
        $scale17 = Figure::where('scale_id','=','2')->get();
       //get how many scales
       $amount17 = Figure::where('scale_id','=','2')->count();

       //16 scales
        $scale16 = Figure::where('scale_id','=','3')->get();
       //get how many scales
       $amount16 = Figure::where('scale_id','=','3')->count(); 

       //nendos
       $nendos = Figure::where('productline_id','=','1')->get();

       //amount nendos
       $amountnendos = Figure::where('productline_id','=','1')->count(); 


       //nendo co-de
       $nendocodes = Figure::where('productline_id','=','4')->get();
       $amountnendocodes = Figure::where('productline_id','=','4')->count(); 

       //nendodroid petit
       $nendopetites = Figure::where('productline_id','=','2')->get();
       $amountnendopetites = Figure::where('productline_id','=','2')->count(); 



       //cu-pouche
       $cupoches = Figure::where('productline_id','=','5')->get();
       $amountcupoches = Figure::where('productline_id','=','5')->count(); 

       //figma
       $figmas = Figure::where('productline_id','=','6')->get();
       $amountfigmas = Figure::where('productline_id','=','6')->count(); 

       //medicchu

       //prize figures



       $figures = DB::select("SELECT figures.* FROM figures,collections WHERE collections.user_id='1' AND collections.figure_id = figures.id AND figures.scale_id='0' AND figures.productline_id !='1' AND figures.productline_id !='2' AND figures.productline_id !='4' AND figures.productline_id !='5' AND figures.productline_id !='6'");

       //how many in total
       $total = FigureController::stats();

        return view('display.about')
          ->with('scale18',$scale18)
          ->with('amount18',$amount18)
          ->with('scale17',$scale17)
          ->with('amount17',$amount17)              
          ->with('scale16',$scale16)
          ->with('amount16',$amount16)  
          ->with('nendos',$nendos)
          ->with('amountnendos',$amountnendos)     
          ->with('nendocodes',$nendocodes)
          ->with('nendopetites',$nendopetites)
          ->with('amountnendopetites',$amountnendopetites)
          ->with('amountnendocodes',$amountnendocodes)  
          ->with('figmas',$figmas)
          ->with('amountfigmas',$amountfigmas)
          ->with('figures',$figures)
          ->with('total',$total);
    }


     /**
     * Figures
     *
     * @return \Illuminate\Http\Response
     */
    public function figures() {
      //2018-03-28 -> switch to new figures table


        //2018-01-28 
       //$collection = Collection::where('user_id','=',1)->figures;
       //$scale18 = DB::select("SELECT figures.* FROM figures,collections WHERE collections.user_id='1' AND collections.figure_id = figures.id AND figures.scale_id ='1'");
       //get how many scales
      // $amount18 = DB::select("SELECT count(figures.id) as count FROM figures,collections WHERE collections.user_id='1' AND collections.figure_id = figures.id AND figures.scale_id ='1'");

       //17 scales
        //$scale17 = DB::select("SELECT figures.* FROM figures,collections WHERE collections.user_id='1' AND collections.figure_id = figures.id AND figures.scale_id ='2'");
       //get how many scales
       //$amount17 = DB::select("SELECT count(figures.id) as count FROM figures,collections WHERE collections.user_id='1' AND collections.figure_id = figures.id AND figures.scale_id ='2'");    

       //16 scales
        // $scale16 = DB::select("SELECT figures.* FROM figures,collections WHERE collections.user_id='1' AND collections.figure_id = figures.id AND figures.scale_id ='3'");
       //get how many scales
      //  $amount16 = DB::select("SELECT count(figures.id) as count FROM figures,collections WHERE collections.user_id='1' AND collections.figure_id = figures.id AND figures.scale_id ='3'");    

       //nendos
      //  $nendos = DB::select("SELECT figures.* FROM figures,collections WHERE collections.user_id='1' AND collections.figure_id = figures.id AND figures.productline_id='1'");
       //amount nendos
      //  $amountnendos = DB::select("SELECT count(figures.id) as count FROM figures,collections WHERE collections.user_id='1' AND collections.figure_id = figures.id AND figures.productline_id='1'");    


       //nendo co-de
      //  $nendocodes = DB::select("SELECT figures.* FROM figures,collections WHERE collections.user_id='1' AND collections.figure_id = figures.id AND figures.productline_id='4'");
      //  $amountnendocodes = DB::select("SELECT count(figures.id) as count FROM figures,collections WHERE collections.user_id='1' AND collections.figure_id = figures.id AND figures.productline_id='4'");

       //nendodroid petit
      //  $nendopetites = DB::select("SELECT figures.* FROM figures,collections WHERE collections.user_id='1' AND collections.figure_id = figures.id AND figures.productline_id='2'");
      //  $amountnendopetites = DB::select("SELECT count(figures.id) as count FROM figures,collections WHERE collections.user_id='1' AND collections.figure_id = figures.id AND figures.productline_id='2'");


       //cu-pouche
      //  $cupoches = DB::select("SELECT figures.* FROM figures,collections WHERE collections.user_id='1' AND collections.figure_id = figures.id AND figures.productline_id='5'");
      //  $amountcupoches = DB::select("SELECT count(figures.id) as count FROM figures,collections WHERE collections.user_id='1' AND collections.figure_id = figures.id AND figures.productline_id='5'");

       //figma
      //  $figmas = DB::select("SELECT figures.* FROM figures,collections WHERE collections.user_id='1' AND collections.figure_id = figures.id AND figures.productline_id='6'");
      //  $amountfigmas = DB::select("SELECT count(figures.id) as count FROM figures,collections WHERE collections.user_id='1' AND collections.figure_id = figures.id AND figures.productline_id='6'");

       //medicchu


       //prize figures

      //  $figures = DB::select("SELECT figures.* FROM figures,collections WHERE collections.user_id='1' AND collections.figure_id = figures.id AND figures.scale_id='0' AND figures.productline_id !='1' AND figures.productline_id !='2' AND figures.productline_id !='4' AND figures.productline_id !='5' AND figures.productline_id !='6'");


       //2018-01-28
       //lets make this more of a database type page, like orders
       //2018-03-28
       //yeah good start all, FigureDB will have the new figure DB

       $figures = FigureDB::all();

        return view('display.figures')
          ->with('figures',$figures);
    }

     /**
     * Nendoroids
     *
     * @return \Illuminate\Http\Response
     */
    public function nendoroids() {

       //nendos
       $nendos = DB::select("SELECT figures.* FROM figures,collections WHERE collections.user_id='1' AND collections.figure_id = figures.id AND figures.productline_id='1'");
       //amount nendos
       $amountnendos = DB::select("SELECT count(figures.id) as count FROM figures,collections WHERE collections.user_id='1' AND collections.figure_id = figures.id AND figures.productline_id='1'");    


       //nendo co-de
       $nendocodes = DB::select("SELECT figures.* FROM figures,collections WHERE collections.user_id='1' AND collections.figure_id = figures.id AND figures.productline_id='4'");
       $amountnendocodes = DB::select("SELECT count(figures.id) as count FROM figures,collections WHERE collections.user_id='1' AND collections.figure_id = figures.id AND figures.productline_id='4'");

       //nendodroid petit
       $nendopetites = DB::select("SELECT figures.* FROM figures,collections WHERE collections.user_id='1' AND collections.figure_id = figures.id AND figures.productline_id='2'");
       $amountnendopetites = DB::select("SELECT count(figures.id) as count FROM figures,collections WHERE collections.user_id='1' AND collections.figure_id = figures.id AND figures.productline_id='2'");


       $figures = DB::select("SELECT figures.* FROM figures,collections WHERE collections.user_id='1' AND collections.figure_id = figures.id AND figures.scale_id='0' AND figures.productline_id !='1' AND figures.productline_id !='2' AND figures.productline_id !='4' AND figures.productline_id !='5' AND figures.productline_id !='6'");

       //how many in total
       $total = FigureController::stats();



       $nendopreorders = Figure::where('productline_id','=',1)->where('status_id','=',3)->get();
       $nendoavailable = Figure::where('productline_id','=',1)->where('status_id','=',2)->get();
       $nendoannounce = Figure::where('productline_id','=',1)->where('status_id','=',1)->get();       

        return view('display.nendoroids')
          ->with('nendos',$nendos)
          ->with('amountnendos',$amountnendos)     
          ->with('nendocodes',$nendocodes)
          ->with('nendopetites',$nendopetites)
          ->with('nendopreorders',$nendopreorders)
          ->with('nendoavailable',$nendoavailable)
          ->with('nendoannounce',$nendoannounce)
          ->with('amountnendopetites',$amountnendopetites)
          ->with('amountnendocodes',$amountnendocodes)  
          ->with('figures',$figures)
          ->with('total',$total);
    }



    /**
     * Order
     *
     * @return \Illuminate\Http\Response
     */
    public function order($order_id) {

       //how many in total
       $total = FigureController::stats();


       $order = Order::find($order_id);
        return view('display.order')
            ->with('total',$total)    
            ->with('order',$order);
    }   


    /**
     * Orders - new 2018-04-16
     *
     * @return \Illuminate\Http\Response
     */
    public function orders() {
      //how many in total
			$total = FigureController::stats();
			 			
			$orders = Order::where('arrival_date','!=','2000-01-01')->where('shipment_date','>','2010-01-01')->orderBy('shipment_date','desc')->get();
      //new orders!
      $preorders = Order::where('shipment_date','<','2010-01-01')->orderBy('order_date','desc')->get();
      //shipped orders
      $shippedorders = Order::where('arrival_date','=','2000-01-01')->where('shipment_date','>','2010-01-01')->orderBy('order_date','desc')->get();

      $total_usd = Order::where('arrival_date','!=','2000-01-01')->where('shipment_date','>','2010-01-01')->sum('total_usd');
      $total_yen = Order::where('arrival_date','!=','2000-01-01')->where('shipment_date','>','2010-01-01')->sum('total_yen');
      $total_shipping_usd = Order::where('arrival_date','!=','2000-01-01')->where('shipment_date','>','2010-01-01')->sum('shipping_usd');
      $total_shipping_yen = Order::where('arrival_date','!=','2000-01-01')->where('shipment_date','>','2010-01-01')->sum('shipping_yen');


      $preorder_total_usd = Order::where('shipment_date','<','2010-01-01')->sum('total_usd');
      $preorder_total_yen = Order::where('shipment_date','<','2010-01-01')->sum('total_yen');
      $preorder_total_shipping_usd = Order::where('shipment_date','<','2010-01-01')->sum('shipping_usd');
      $preorder_total_shipping_yen = Order::where('shipment_date','<','2010-01-01')->sum('shipping_yen');

      $shipped_total_usd = Order::where('arrival_date','=','2000-01-01')->where('shipment_date','>','2010-01-01')->sum('total_usd');
      $shipped_total_yen = Order::where('arrival_date','=','2000-01-01')->where('shipment_date','>','2010-01-01')->sum('total_yen');
      $shipped_total_shipping_usd = Order::where('arrival_date','=','2000-01-01')->where('shipment_date','>','2010-01-01')->sum('shipping_usd');
      $shipped_total_shipping_yen = Order::where('arrival_date','=','2000-01-01')->where('shipment_date','>','2010-01-01')->sum('shipping_yen');


			return view('display.orders')
			->with('total',$total) 
			->with('total_usd',$total_usd)
      ->with('total_yen',$total_yen)  
      ->with('preorder_total_usd',$preorder_total_usd)
      ->with('preorder_total_yen',$preorder_total_yen)  
      ->with('shipped_total_usd',$shipped_total_usd)
      ->with('shipped_total_yen',$shipped_total_yen)       
			->with('total_shipping_usd',$total_shipping_usd)     
      ->with('total_shipping_yen',$total_shipping_yen)
			->with('preorder_total_shipping_usd',$preorder_total_shipping_usd)     
      ->with('preorder_total_shipping_yen',$preorder_total_shipping_yen)     
			->with('shipped_total_shipping_usd',$shipped_total_shipping_usd)     
			->with('shipped_total_shipping_yen',$shipped_total_shipping_yen)            
      ->with('orders',$orders)
      ->with('preorders',$preorders)
      ->with('shippedorders',$shippedorders);
		}

    /**
     * Orders
     *
     * @return \Illuminate\Http\Response
     */
    public function ordersOLD() {

       //how many in total
       $total = FigureController::stats();

       $orders = Order::orderBy('order_date','desc')->get();
        //$orders = Order::orderBy('id','desc')->get();

       //$orders = Order::all();


        // foreach($cards as $key => $card) {
        //     $skill = Skill::select('japanese_description')->where('id','=',$card->dorifes_id)->first();
        //     //$test =  $skill->japanese_description;
        //     $cards[$key]->dorifes_skill = $skill['japanese_description'];
        //   }






      // foreach($orders as $key => $order) {
      //   //get info
      //   $store = Store::select('name')->where('id','=',$order->store_id)->first();
      //   $orders[$key]->store = $store['name'];

      //   //get the figures
      //   $figures = Collection::where('order_id','=',$order->id)->get();
      //   foreach($figures as $fkey => $figure) {
      //     $figure_info = Figure::select('name')->where('id','=',$figure->figure_id)->first();
      //      $figures[$fkey]->name = substr($figure_info['name'],0,35);
      //   }

      //   $orders[$key]->figures = $figures;

      //  }

       $total_usd = Order::sum('total_usd');
       $total_yen = Order::sum('total_yen');
       $total_shipping_usd = Order::sum('shipping_usd');
       $total_shipping_yen = Order::sum('shipping_yen');

        return view('display.ordersOLD')
            ->with('total',$total) 
            ->with('total_usd',$total_usd)
            ->with('total_yen',$total_yen)  
            ->with('total_shipping_usd',$total_shipping_usd)     
            ->with('total_shipping_yen',$total_shipping_yen)
            ->with('orders',$orders);
    }   



    /**
     * Just Rants
     *
     * @return \Illuminate\Http\Response
     */
    public function rants() {

       //how many in total
       $total = FigureController::stats();

        $blogs = Blog::orderBy('created_at','desc')->where('active','=','1')->where('type','=','rant')->paginate(10);

        return view('welcome')
            ->with('total',$total)        
            ->with('blogs',$blogs);
    }   




      /**
     * Just Reviews
     *
     * @return \Illuminate\Http\Response
     */
    public function reviews() {

        //how many in total
        $total = FigureController::stats();

        $blogs = Blog::orderBy('created_at','desc')->where('active','=','1')->where('type','=','review')->paginate(10);        

        return view('welcome')
            ->with('total',$total)        
            ->with('blogs',$blogs);
    }   
    
     /**
     * Just News
     *
     * @return \Illuminate\Http\Response
     */
    public function news() {
        //how many in total
        $total = FigureController::stats();
        $blogs = Blog::orderBy('created_at','desc')->where('active','=','1')->where('type','=','news')->paginate(10);

        return view('welcome')
            ->with('total',$total)
            ->with('blogs',$blogs);
    }   


     /**
     * tool for searching amiami
     *
     * @return \Illuminate\Http\Response
     */
    public function toolAmiAmiSearch() {

      $total = FigureController::stats();
        return view('tools.amiamisearch')
         ->with('total',$total);
    }   


     /**
     * nendoroid tracker
     *
     * @return \Illuminate\Http\Response
     */
    public function nendoroidTrackerOld() {
       //how many in total
       $total = FigureController::stats();

       $nendoavailable = Nendoroid::where('productline_id','=',1)->where('status_id','!=',1)->orderBy('available_date','desc')->get();
       $nendoannounce = Nendoroid::where('productline_id','=',1)->where('status_id','=',1)->get();       

        return view('tools.nendoroidTracker')
          ->with('nendoavailable',$nendoavailable)
          ->with('nendoannounce',$nendoannounce)
          ->with('total',$total);
    }   



         /**
     * nendoroid tracker
     *
     * @return \Illuminate\Http\Response
     */
    public function nendoroidTracker($type ='') {
       //how many in total
       //$total = FigureController::stats();

       //$nendoavailable = Nendoroid::where('productline_id','=',1)->where('status_id','!=',1)->orderBy('available_date','desc')->get();
       //$nendoannounce = Nendoroid::where('productline_id','=',1)->where('status_id','=',1)->get();    
       
       //get new figure db
      



       if ($type == 'released') {
         $figures = FigureDB::where('productline_id','=',7)->where('item_number','!=','')->orderBy('item_number','asc')->get();
       } else if ($type == 'announced') {
         $figures = FigureDB::where('productline_id','=',7)->where('item_number','=','0')->get();
       } else {
        $figures = FigureDB::where('productline_id','=',7)->get();
       }

        return view('display.nendoroidTracker')
          ->with('figures',$figures);
    }  

     /**
     * nendoroid boxes
     *
     * @return \Illuminate\Http\Response
     */
    public function nendoroidBoxes() {
       //how many in total
       $total = FigureController::stats();

       $nendoavailable = Nendoroid::where('productline_id','=',1)->where('status_id','!=',1)->orderBy('available_date','desc')->get();
       $nendoannounce = Nendoroid::where('productline_id','=',1)->where('status_id','=',1)->get();       

        return view('display.nendoroidbox')
          ->with('nendoavailable',$nendoavailable)
          ->with('nendoannounce',$nendoannounce)
          ->with('total',$total);
    }  


    /**
     * Sale page
     *
     * @return \Illuminate\Http\Response
     */
    public function sale() {
        return view('display.sale');
    }


    /**
     * Graphs page
     *
     * @return \Illuminate\Http\Response
     */
    public function graphs() {
        return view('display.graphs');
    }



/////////////////////////////////

    /**
     * Contact page
     *
     * @return \Illuminate\Http\Response
     */
    public function contact() {
        return view('display.contact');
    }


    /**
     * Contact page - > send
     *
     * @return \Illuminate\Http\Response
     */
    public function contactSend(Request $request) {


        $m = new Message;

        $m->name = $request->name;
        $m->email = $request->email;
        $m->message = $request->message;
        $m->updated_by = 0;
        $m->save();

//         $name = $request->name;
//         $email = $request->email;
//         $content = $request->message;

// $headers = 'From: '.$email. "\r\n" .
//     'Reply-To: '.$email. "\r\n" .
//     'X-Mailer: PHP/' . phpversion();

//         mail('cc@figurerant.com','Figure Rant - New Contact Form from '.$name,$content,$headers);


        return view('display.contactThankYou');
    }  



    ///////////???RSSS/////////////
     /**
     * Generate the rss feed
     *
     * @return \Illuminate\Http\Response
     */
      public function rss()
      {
        $rss = $this->getRSS();

        return response($rss)
          ->header('Content-type', 'application/rss+xml');
      }


/**
   * Return the content of the RSS feed
   * This method returns the entire feed as a string. We cache the results for 2 hours so the feed isn’t constantly being built.
   */
  public function getRSS()
  {
    // if (Cache::has('rss-feed')) {
    //   return Cache::get('rss-feed');
    // }

    $rss = $this->buildRssData();
    //Cache::add('rss-feed', $rss, 120);

    return $rss;
  }



    public function __toString() {
            return $this->$feed;
    }


  /**
   * Return a string with the feed data
   * This method build the feed itself from the posts table.
   *
   * @return string
   */
  protected function buildRssData()
  {
    $now = date('Y-m-d h:i:s');
    $feed = new Feed();
    $channel = new Channel();

    //$channel->title(config('blog.title'))->appendTo($feed);
    //$channel->description(config('blog.description'))->appendTo($feed);
    //$channel->url(url())->appendTo($feed);
    //$channel->title

    $channel
      ->title(config('blog.title'))
      ->description(config('blog.description'))
      ->url('http://figurerant.com')
      ->language('en')
      ->copyright('Copyright (c) '.config('blog.author'))
      ->lastBuildDate($now)
      ->appendTo($feed);


    $posts = Blog::where('created_at', '<=', $now)
      ->where('active', 1)
      ->orderBy('created_at', 'desc')
      ->take(config('blog.rss_size'))
      ->get();


    foreach ($posts as $post) {
      $item = new Item();
      $item
        ->title($post->title)
        ->description($post->blurb)
        ->url('http://figurerant.com/'.$post->url)
        ->pubDate($post->created_at)
        ->guid('http://figurerant.com/'.$post->url, true)
        ->appendTo($channel);
    }

    $feed = (string)$feed;


      print '<pre>';
      var_dump($feed);
      print '</pre>';
      echo 'hi';
      exit;

    // Replace a couple items to make the feed more compliant
    $feed = str_replace(
      '<rss version="2.0">',
      '<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">',
      $feed
    );
    $feed = str_replace(
      '<channel>',
      '<channel>'."\n".'    <atom:link href="'.url('/rss').
      '" rel="self" type="application/rss+xml" />',
      $feed
    );

    return $feed;
  }



}
