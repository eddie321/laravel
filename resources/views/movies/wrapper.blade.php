<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page_title')</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
        crossorigin="anonymous">
</head>
<body>
   
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Movies</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('movies') }}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ action('movieController@listing') }}">List of Movies</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('movie_detail', ['id' => {$id}]) }}">Details...</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">New Movie</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">New Actor</a>
      </li>
    </ul>
  </div>
</nav>  
<!--    // below are 3 ways of generating nav links
        // ** The 3rd requires you to provide a ->name; in the relevant web.php Route::get condition
        1. <a href="{{ url('movies') }}">Home</a>
        2. <a href="{{ action('movieController@listing') }}">List of Movies</a>
        // ['id' => 1] ** second argument included because of url parameter included {id} within web.php Route::get()
        3. <a href="{{ route('movie_detail', ['id' => 1]) }}">Details...</a>
    </nav> -->

<div class="container">

    @if(Session()->has('success_message'))
    <div class="alert alert-success">
        {{ session()->get('success_message')}}
    </div>
    @endif

    @yield('content')

</div>
</body>
</html>