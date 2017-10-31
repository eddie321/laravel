@extends('movies/wrapper')

@section('content')

<?php
if ($_GET) {
    echo 'saved';
    exit;
}

if ($_POST) {
    $errors = array();
    if (empty($_POST['title'])) {
        $errors[] = 'missing firstname <br>';
    }
    if (empty($_POST['year'])) {
        $errors[] = 'missing lastname <br>';
    }

    if (empty($errors)) {
        //savedata()
        header('Location: forms.php?status=ok');
        exit;
    }
    else {
        foreach ($errors as $error) {
            echo $error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit.blade</title>
</head>
<body>
    
    <h1>Add Film to the database</h1>
<form action="" method="post">

{{ csrf_field() }}
    <div class="form-group">
        <label for="title_input">Title:</label>
        <input type="text" name="title" value="{{ $movie->title }}" id="title_input">
    </div>

    <div class="form-group">
        <label for="year_input">Year:</label>
        <input type="text" name="year" value="{{ $movie->year }}" id="year_input">
    </div>

    <div class="form-group">
        <label for="plot_input">Plot:</label>
        <textarea class="form-control" name="plot" id="plot_input">{{ $movie->title }}</textarea>
    </div>

    <div class="form-group">
        <div class="submit">
            <input class="btn btn-outline-secondary" type="submit" value="send">
        </div>
    </div>
</form>


</body>
</html>

@endsection