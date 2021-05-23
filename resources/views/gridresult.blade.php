@extends('layout')

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('assets/css/gridrsult.css') }}">
@endsection('custom_css')

@section('custom_title')
    <title>ShortMovie</title>
@endsection('custom_title')

@section('content')
<div class="container-fluid">
    <h3>{{$genre}} Movies</h3>
    <div class="card-columns">
        @foreach($category as $genre)
        <div class="card">
            <img class="card-img-top" src="{{ $genre->urlFoto }}" alt="Card image cap">
            <div class="card-body text-center">
                <p class="card-title">{{$genre->title}} ({{$genre->firstBroadcast}})</p>
                <a class="btn btn-primary" href="/movies/{{$genre->id}}" role="button">Watch Now</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection('content')