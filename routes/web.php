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
Route::get('/orders', 'DisplayController@orders');
Route::get('/order/{order_id}', 'DisplayController@order');

Route::get('/figures', 'DisplayController@figures');
Route::get('/figures/nendoroids', 'DisplayController@nendoroids');

//figureDB
Route::get('/figure/{figure}','FiguredbController@figure');
Route::get('/group/{group}','FiguredbController@group');

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

//generate the rss feed
Route::get('/createrss','DisplayController@rss');

//sale
Route::get('/sale','DisplayController@sale');

//tools
Route::get('/tools', 'DisplayController@toolAmiAmiSearch');
Route::get('/tools/amiami-search', 'DisplayController@toolAmiAmiSearch');
Route::get('/tools/nendoroid-tracker', 'DisplayController@nendoroidTrackerOld');

//nendotracker - new version 2018-03-24
Route::get('/nendoroid-tracker', 'DisplayController@nendoroidTracker');
//
Route::get('/nendoroid-tracker/{type}', 'DisplayController@nendoroidTracker');

//front database for well figures? already have a /figures what is it  lets use it

//daata
Route::get('/graphs', 'DisplayController@graphs');
Route::get('/data/yenusd','DataController@yenusd');
Route::get('/data/totalorders','DataController@totalorders');


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



////meessssing around

Route::get('/tool/addnendos','FiguredbController@addNendos');

