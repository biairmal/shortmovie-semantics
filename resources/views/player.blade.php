@extends('layout')
@section('custom_css')
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
@endsection('custom_css')

@section('custom_title')
    <title>ShortMovie</title>
@endsection('custom_title')

@section('content')
<div class="container-fluid">
    <div class="row">
        @foreach($movie as $movie)
        <div class="col-12">
            <iframe width="840" height="472,5" src="{{$new_link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
            </iframe>
            <div class="desc mt-3"> 
                <h1><strong>{{$movie->title}} ({{$movie->firstBroadcast}})</strong></h1>
                <p>{{$movie->genre}} Movie</p>
                <p>Directed By : {{$movie->director}}</p>
                <p>Cast : {{$movie->actor}}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection('content')