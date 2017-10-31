<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// first argumnet = root, second argument is a callable funciton or a controller (in this case a closure function)
Route::get('/', function () {
    return view('index'); // loads resources/views/index.php instead of''/welcome.blade.php (i.e. welcome)
});


// route for 5 oceans
// route wil look like e.g. /ocean/anything
Route::get('/ocean/{name}', function($name){

    return view('oceans/'. $name);
})// -> constraints --> i.e. if you want to limit the get url breadth e.g. digits only, this is where those parameters are stated
->where('name', '[a-zA-Z]+') //one or more letters
->name('ocean detail'); //this route will be known as 'ocean detail'


// above callback function parameter is same as all the below code :
// Route::get('/ocean/pacific', function(){
//     return view('oceans/pacific');
// });

// Route::get('/ocean/indian', function(){
//     return view('oceans/indian');
// });

// Route::get('/ocean/southern', function(){
//     return view('oceans/southern');
// });


Route::get('/movies', 'indexController@movies_homepage');

Route::get('/movies/list', 'movieController@listing');

Route::get('/movies/movie/{id}', 'movieController@detail')->name('movie_detail');

Route::get('/movies/movie/test_insert', 'movieController@test_insert');

Route::get('/movies/new', 'movieController@create'); // displays form
Route::post('/movies/new', 'movieController@store'); // handles submission
// Route::any('/movies/new', 'movieController@create'); --> any method - get, post or other

Route::get('/movies/edit/{id}', 'movieController@edit');
Route::post('/movies/edit/{ids}', 'movieController@store');

Route::post('/movies/search', 'movieController@search');

Route::get('/actors/new', 'actorController@create');
Route::post('/actors/new', 'actorController@store');
Route::get('/actors/edit/{id}', 'actorController@edit');
Route::post('/actors/edit/{id}', 'actorController@store');