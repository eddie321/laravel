<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class indexController extends Controller
{
    //each method is one action
    //each action represents one page

    public function movies_homepage()
    {
        $view = view('movies/homepage'); // resources/views/  movies/homepage   .blade.php
        return $view;
    }
}
