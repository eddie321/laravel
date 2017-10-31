@extends('movies/wrapper')

@section('content')

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{!! Form::open(['url' => '', 'method' => 'post']) !!}

    <div class="form-group">
        <label for="full_name_input">Full name:</label><br>
        OLD value: {{ old('full_name', null )}}
        <input class="form-control" type="text" name="full_name" value="{{ old('full_name', $actor->full_name) }}" id="full_name_input">
    </div>

    <div class="form-group">
        <label for="year_of_birth_input">Year of birth:</label><br>
        OLD value: {{ old('year_of_birth', null )}}
        <input class="form-control" type="text" name="year_of_birth" value="{{ old('year_of_birth', $actor->year_of_birth) }}" id="year_of_birth_input">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="save">
    </div>

{!! Form::close() !!}

@endsection