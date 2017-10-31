@extends('movies/wrapper')
@section('content')

<a href="{{ action('movieController@edit', ['id' => $movie->id]) }}" class="btn btn-primary">Edit this movie?</a>

<h1 class='title'>{{ $movie->title }}</h1>

<h2 class='year'>{{ $movie->year }}</h2>

<p class='plot'>{{ $movie->plot }}</p>

@endsection

@section('page_title') {{ $movie->title }} {{ $movie->year }} @endsection