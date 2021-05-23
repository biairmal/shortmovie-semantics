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
        <div class="col-12">
            <div class="jumbotron">
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="#" role="button">Watch Now</a>
                </p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
        <h3>All Movies</h3>
        <br>
            <div class="carousel">
            <div id="slider-slick" class="slider">
                @forelse($dataAll as $data)
                <div class="col">
                    <div class="card">
                        <img class="card-img-top" src="{{ $data->urlFoto }}" alt="Card image cap">
                        <div class="card-body text-center">
                            <p class="card-title">{{$data -> title}} ({{$data->firstBroadcast}})</p>
                            <a class="btn btn-primary" href="/movies/{{$data->id}}" role="button">Watch Now</a>
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
    </div>

</div>
@endsection('content')

@section('custom_js_bottom')
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>			
    <script type="text/javascript" src="{{ asset('/assets/js/landing.js') }}"></script>
@endsection