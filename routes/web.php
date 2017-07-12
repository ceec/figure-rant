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

Route::get('/rants', 'DisplayController@rants');
Route::get('/reviews', 'DisplayController@reviews');
Route::get('/news', 'DisplayController@news');

//{type}/{url}
Route::get('/rant/{url}', 'DisplayController@article');
Route::get('/news/{url}', 'DisplayController@article');
Route::get('/haul/{url}', 'DisplayController@article');
Route::get('/review/{url}', 'DisplayController@article');

//generate the rss feed
Route::get('/createrss','DisplayController@rss');

//tools
Route::get('/tools', 'DisplayController@toolAmiAmiSearch');
Route::get('/tools/amiami-search', 'DisplayController@toolAmiAmiSearch');
Route::get('/tools/nendoroid-tracker', 'DisplayController@nendoroidTracker');

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





