<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/', 'DisplayController@index');

Route::get('/about', 'DisplayController@about');
Route::get('/ordersOLD', 'DisplayController@ordersOLD');
Route::get('/order/{order_id}', 'DisplayController@order');

//new orders
Route::get('/orders', 'DisplayController@orders');
//preorders
Route::get('/preorders', 'DisplayController@preorders');

Route::get('/figures', 'DisplayController@figures');
Route::get('/figures/nendoroids', 'DisplayController@nendoroids');

//goods
Route::get('/goods', 'DisplayController@goods');
Route::get('/good/{good}', 'FiguredbController@good');

//figureDB
Route::get('/figure/{figure}','FiguredbController@figure');
Route::get('/roundup/{group}','FiguredbController@roundup');

// Route::get('/group/{group}','FiguredbController@group');
// Route::get('/manufacturer/{manufacturer}','FiguredbController@manufacturer');
// Route::get('/character/{character}','FiguredbController@character');
// Route::get('/product-line/{product_line}','FiguredbController@group');
// Route::get('/sculptor/{sculptor}','FiguredbController@group');
// Route::get('/scale/{scale}','FiguredbController@group');

Route::get('/rants', 'DisplayController@rants');
Route::get('/reviews', 'DisplayController@reviews');
Route::get('/news', 'DisplayController@news');

//{type}/{url}
//should make this nicer
Route::get('/rant/{url}', 'DisplayController@article');
Route::get('/news/{url}', 'DisplayController@article');
Route::get('/haul/{url}', 'DisplayController@article');
Route::get('/review/{url}', 'DisplayController@article');
Route::get('/event/{url}', 'DisplayController@article');

//adding in nendo tracker 2018-05-28
Route::get('/nendoroid-tracker/{type}', 'DisplayController@nendoroidTracker');

//daata
Route::get('/graphs', 'DisplayController@graphs');
Route::get('/data/yenusd','DataController@yenusd');
Route::get('/data/totalorders','DataController@totalorders');

Route::get('/graph/shiptime','DisplayController@shiptime');
Route::get('/data/shiptime','DataController@shiptime');

Route::get('/graph/figureyear','GraphController@figureyear');
Route::get('/data/figureyear','DataController@figureyear');

//lul not having this under the above breaks it
Route::get('/{category}/{url}','FiguredbController@displayCategory');

//generate the rss feed
Route::get('/createrss','DisplayController@rss');

//sale
Route::get('/sale','DisplayController@sale');

//collection
Route::get('/collection','DisplayController@collection');
Route::get('/sold','DisplayController@sold');

//tools
Route::get('/tools', 'DisplayController@toolAmiAmiSearch');
Route::get('/tools/amiami-search', 'DisplayController@toolAmiAmiSearch');
Route::get('/tools/nendoroid-tracker', 'DisplayController@nendoroidTrackerOld');

//nendotracker - new version 2018-03-24
Route::get('/nendoroid-tracker', 'DisplayController@nendoroidTracker');





//nendoroid info
Route::get('/nendoroid-boxes','DisplayController@nendoroidBoxes');


//contact form
Route::get('/contact','DisplayController@contact');
Route::post('/contact/send','DisplayController@contactSend');


Route::get('rss.xml', function(){

    // create new feed
    $feed = App::make("feed");

    // multiple feeds are supported
    // if you are using caching you should set different cache keys for your feeds

    // cache the feed for 60 minutes (second parameter is optional)
    $feed->setCache(60, 'laravelFeedKey');

    // check if there is cached feed and build new only if is not
    if (!$feed->isCached())
    {
       // creating rss feed with our most recent 20 posts
       $posts = \DB::table('blogs')->orderBy('created_at', 'desc')->take(20)->get();

       // set your feed's title, description, link, pubdate and language
       $feed->title = 'Figure Rant';
       $feed->description = 'Figure news, reviews, and rants';
       //$feed->logo = 'http://yoursite.tld/logo.jpg';
       $feed->link = url('rss.xml');
       $feed->setDateFormat('datetime'); // 'datetime', 'timestamp' or 'carbon'
       $feed->pubdate = $posts[0]->created_at;
       $feed->lang = 'en';
       $feed->setShortening(true); // true or false
       $feed->setTextLimit(100); // maximum length of description text

       foreach ($posts as $post)
       {
           // set item's title, author, url, pubdate, description, content, enclosure (optional)*
           $feed->add($post->title, $post->updated_by, URL::to($post->type.'/'.$post->url), $post->created_at,$post->content);
       }

    }

    // first param is the feed format
    // optional: second param is cache duration (value of 0 turns off caching)
    // optional: you can set custom cache key with 3rd param as string
    return $feed->render('atom');

    // to return your feed as a string set second param to -1
    // $xml = $feed->render('atom', -1);

});


Auth::routes();

Route::get('/home', 'HomeController@index');

//add edit blog
Route::get('/home/blog/add','BlogController@addDisplay');
Route::get('/home/blog/edit/{blog_id}','BlogController@editDisplay');
Route::get('/home/blog/list','BlogController@listDisplay');
//posting
Route::post('/add/blog','BlogController@add');
Route::post('/edit/blog','BlogController@edit');


///add edit figure
Route::get('/home/figure/add','FigureController@addDisplay');
Route::get('/home/figure/edit/{figure_id}','FigureController@editDisplay');
Route::get('/home/figure/list','FigureController@listDisplay');
//posting
Route::post('/add/figure','FigureController@add');
Route::post('/edit/figure','FigureController@edit');

///goods
Route::get('/home/good/add','GoodController@addDisplay');
Route::get('/home/good/edit/{good_id}','GoodController@editDisplay');
Route::get('/home/good/list','GoodController@listDisplay');
//posting
Route::post('/add/good','GoodController@add');
Route::post('/edit/good','GoodController@edit');

///orders
Route::get('/home/order/add','OrderController@addDisplay');
Route::get('/home/order/edit/{order_id}','OrderController@editDisplay');
Route::get('/home/order/list','OrderController@listDisplay');
//posting
Route::post('/add/order','OrderController@add');
Route::post('/edit/order','OrderController@edit');
//adding figure to user
Route::post('/add/user/figure','OrderController@addFigure');
//adding good to user
Route::post('/add/user/good','OrderController@addGood');
//add figure to order
Route::post('/edit/order/figure','OrderController@editOrderFigure');
Route::post('/remove/order/figure','OrderController@removeOrderFigure');
//add good to order
Route::post('/edit/order/good','OrderController@editOrderGood');
Route::post('/remove/order/good','OrderController@removeOrderGood');

//sales of figures
Route::get('/home/sale/add','SaleController@addDisplay');
Route::get('/home/sale/edit/{sale_id}','SaleController@editDisplay');
Route::get('/home/sale/list','SaleController@listDisplay');
//posting
Route::post('/add/sale','SaleController@add');
Route::post('/edit/sale','SaleController@edit');



///add edit categories
//groups
Route::get('/home/group/add','GroupController@addDisplay');
Route::get('/home/group/edit/{group_id}','GroupController@editDisplay');
Route::get('/home/group/list','GroupController@listDisplay');
//posting
Route::post('/add/group','GroupController@add');
Route::post('/edit/group','GroupController@edit');

//characters
Route::get('/home/character/add','CharacterController@addDisplay');
Route::get('/home/character/edit/{character_id}','CharacterController@editDisplay');
Route::get('/home/character/list','CharacterController@listDisplay');
//posting
Route::post('/add/character','CharacterController@add');
Route::post('/edit/character','CharacterController@edit');

//sculptors
Route::get('/home/sculptor/add','SculptorController@addDisplay');
Route::get('/home/sculptor/edit/{sculptor_id}','SculptorController@editDisplay');
Route::get('/home/sculptor/list','SculptorController@listDisplay');
//posting
Route::post('/add/sculptor','SculptorController@add');
Route::post('/edit/sculptor','SculptorController@edit');


//Stores
Route::get('/home/store/add','StoreController@addDisplay');
Route::get('/home/store/edit/{store}','StoreController@editDisplay');
Route::get('/home/store/list','StoreController@listDisplay');
//posting
Route::post('/add/store','StoreController@add');
Route::post('/edit/store','StoreController@edit');

//scales
Route::get('/home/scale/add','ScaleController@addDisplay');
Route::get('/home/scale/edit/{scale}','ScaleController@editDisplay');
Route::get('/home/scale/list','ScaleController@listDisplay');
//posting
Route::post('/add/scale','ScaleController@add');
Route::post('/edit/scale','ScaleController@edit');

//manufacturers
Route::get('/home/manufacturer/add','ManufacturerController@addDisplay');
Route::get('/home/manufacturer/edit/{scale}','ManufacturerController@editDisplay');
Route::get('/home/manufacturer/list','ManufacturerController@listDisplay');
//posting
Route::post('/add/manufacturer','ManufacturerController@add');
Route::post('/edit/manufacturer','ManufacturerController@edit');


////meessssing around

Route::get('/tool/addnendos','FiguredbController@addNendos');


