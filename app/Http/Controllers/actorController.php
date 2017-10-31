<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actor;

class actorController extends Controller
{
    //
    public function create() {
        $view = view('actors/edit');
        $view->actor = new Actor();
        
        return $view;
    }

    public function store($id = null) {

        // validating the request - not the object
        $request = request();
        // could also include Request $request, in parameters (as in store(Request $request,$id = null) )

        $rules = [
            'full_name' => 'required',
            'year_of_birth' => 'required|numeric|min:1901|max:2155'
        ];

        // VALIDATE REQUEST
        $this->validate($request, $rules);

        if($id) // if this is edit
        {
            $actor = Actor::findOrFail($id); // find actor in database or fail with 404
        }
        else // else it is create
        {
            $actor = new Actor(); // create a new empty actor object
        }
        
        // fill the actor object with the request data
        $actor->fill(request()->only([
            'full_name',
            'year_of_birth'
        ]));
        
        $actor->save();
        
        session()->flash('success_message', 'Actor was successfully saved');
        
        return redirect()->action('ActorController@edit', ['id' => $actor->id]);
    }

    public function edit($id = null) {
        $actor = Actor::findOrFail($id); // find the actor in db or fail with 404
        
        $view = view('actors/edit'); // prepare the edit view
        $view->actor = $actor; // put the actor object inside the view
        
        return $view;
    }
}
