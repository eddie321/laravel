@extends('movies/wrapper')
@section('content')

<h1>List of Movies</h1>

<input type="text" name="search" id="search">
<button id="btn">Search!</button>

<ul>
    @foreach($movies as $movie)
    <li>
    <a href="{{ route('movie_detail', ['id' => $movie->id]) }}">
    <!-- OR: 
    <a href="{{ action('movieController@detail', ['id' => $movie->id]) }}"> 
    <a href="{{ url('movies/movie/' . $movie->id) }}"> 
    -->
        {{ $movie->title }} ({{ $movie->year }})
    </a>
    </li>
    @endforeach
</ul>

<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>

<script>
$('#btn').click(function(){
    var s = $('#search').val();

    $.ajax({
        // where to send data?
        'url': '/movies/search',
        'type': 'post',
        'data': {
            'search': s
        }
    })

// this is an unsafe example, because of csrf exception
    .done(function (data) {
        console.log(data.length)

        $('ul').empty();
        for(var i = 0; i < data.length; i++)
        {
            $('ul').append(
                '<li>'+
                    '<a href"">' + data[i].title + ' (' + data[i].year + ')</a>' +
                '</li>'
            )
        }
    })
})
</script>

@endsection

@section('page_title') List of Movies @endsection

