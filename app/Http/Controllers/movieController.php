<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Movie;

class movieController extends Controller
{
    // list of movies
    public function listing()
    {
        $view = view('movies/listing');

        // select all movies from the model Movie()
        //the all() method on any class gives us all objects
        // $all_movies = Movie::all(); --> more simple than below statement
        $all_movies = Movie::orderBy('title', 'asc')->get();
        $view->movies = $all_movies;

        return $view;
    }

    // detail of a movie
    // $id will contain information that points to the current url {id} parameter
    public function detail($id)
    {
        $view = view('movies/detail');

        // find record with id included in url
        $movie = Movie::find($id);
        // $movie = Movie::where('id', 1)->first();     //equivalent to url pointing to 1st item in movies table
        $view->movie = $movie;

        return $view;
    }

    public function create()
    {
        $view = view('movies/edit');
        $view->movie = new Movie();
        
        return $view;
    }

    public function edit($id)
    {
        $movie = Movie::findOrFail($id);

        $view = view('movies/edit');
        $view->movie = $movie;

        return $view;
    }


    // to handle submission of new database item
    public function store(Request $request, $id = null)
    {
        if($id) // if this is edit
        {
            $movie = Movie::findOrFail($id); // select film from DB
        }
        else
        {
           $movie = new Movie(); // create empty object movie
        }
       
        // fill it with selected data from the request
        $movie->fill($request->only([
            'title',
            'year',
            'plot'
        ]));
        
        $movie->save();

        // inform user of success
        // \Session::flash('success_message', 'The movie was successfully saved!');
        session()->flash('success_message', 'The movie was successfully saved!');        
        
        //redirect somewhere
            return redirect()->action('movieController@listing');


    //NOTES........      
        // $request = request(); // request() is a global function
        // this gets us the request object
        // instead of using this step, we could replave the $request in below input retrieving functions with request()
        // this would skip a step, and simply return the request item inline

        // if($request->has('title'))
        // {
        //     $title = $request->input('title');
        //     dd($title);
        // }

        // $request_data = $request->all(); 

        // $request_data = $request->only([
        //     'title',
        //     'year',
        //     'plot'
        // ]); 

        // also: $request->except( [ array ])

        // $movie->fill($request->all());
       
        // $movie->title = $request->input('title');
        // $movie->year = $request->input('year');
        // $movie->plot = $request->input('plot');
        // dd($movie);
    }



    // inserts a movie into the database (for testing purposes)
    public function test_insert()
    {
        // create an object of the model class
        $movie = new Movie(); // must declare namespace for class Movie(). Look up ^^

        // modify it's properties
        $movie->title = 'Searching for Sugarman';
        $movie->year = 2012;
        $movie->plot = 'Documentary following the life and music of American folk-rock musician Rodriguez.';

        $movie->title = 'Looking for Alibrandi';
        $movie->year = 2001;
        $movie->plot = 'Young second generation Italian girl goes about her life.';

        $movie->title = 'Jaws';
        $movie->year = 1994;
        $movie->plot = 'Giant shark!';

        // save the object (commented out so that when accessed, movies are not added over and over and over again :) )
        // $movie->save();

        // inform the user
        return 'Movie was saved!';
    }

    public function search(Request $request)
    {
        $search = $request->search;

        return Movie::where('title', 'LIKE', '%' . $search . '%')->get();
    }
}