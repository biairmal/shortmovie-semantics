@extends('layout')
@section('custom_css')
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
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
                <h1 class="text-style">{{$movie->title}} ({{$movie->firstBroadcast}})</h1>
                <p>{{$movie->genre}} Movie</p>
                <p>Directed By : {{$movie->director}}</p>
                <p>Cast : {{$movie->actor}}</p>
            </div>
        </div>
        @endforeach

        <div class="ml-3 mb-3 mt-5">
            <h3 class="text-style">Recommended For You</h3>
        </div>
        <div id="slider-slick" class="slider">
            @forelse($sameGenre as $recommended)
            <div class="col">
                <div class="card">
                    <img class="card-img-top" src="{{$recommended->urlFoto}}" alt="Card image cap">
                    <div class="card-body text-center">
                        <p class="card-title">{{$recommended -> title}} ({{$recommended->firstBroadcast}})</p>
                        <a class="btn btn-primary" href="/movies/{{$recommended->id}}" role="button">Watch Now</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col">
                <div class="card">
                    <div class="card-body text-center">
                        <p class="card-title">Data Kosong</p>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection('content')

@section('custom_js_bottom')
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>			
    <script type="text/javascript" src="{{ asset('/assets/js/landing.js') }}"></script>
@endsection