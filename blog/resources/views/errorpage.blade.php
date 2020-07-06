@extends('layouts.base')

@section('content')
    <div class="jumbotron">
        <h1>Error!!!</h1>
        <p>You do not have such a notebook!!!!</p>
        <p>
            <a class="btn btn-lg btn-primary" href="{{route('notebooks.index')}}" role="button">Back</a>
        </p>
    </div>
@endsection