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
        <h3>Genre</h3>
        <div class="card-column">
            @forelse($byGenre as $Genre)
            <div class="card">
                <img class="card-img-top" src="{{ asset('assets/img/poster.jpg') }}" alt="Card image cap">
                <div class="card-body text-center">
                    <p class="card-title">{{$Genre -> title}} ({{$Genre -> firstBroadcast}})</p>
                    <a class="btn btn-primary" href="#" role="button">Watch Now</a>
                </div>
            </div>
            @empty
            <h3>Tidak ada</h3>
            @endforelse
        </div>
    </div>

    <div class="row">
        <h3>Year</h3>
        <div class="card-column">
            @forelse($byYear as $Year)
            <div class="card">
                <img class="card-img-top" src="{{ asset('assets/img/poster.jpg') }}" alt="Card image cap">
                <div class="card-body text-center">
                    <p class="card-title">{{$Year -> title}} ({{$Year -> firstBroadcast}})</p>
                    <a class="btn btn-primary" href="#" role="button">Watch Now</a>
                </div>
            </div>
            @empty
            <h3>Tidak ada</h3>
            @endforelse
        </div>
    </div>

    <div class="row">
        <h3>Title</h3>
        <div class="card-column">
            @forelse($byTitle as $Title)
            <div class="card">
                <img class="card-img-top" src="{{ asset('assets/img/poster.jpg') }}" alt="Card image cap">
                <div class="card-body text-center">
                    <p class="card-title">{{$Title -> title}} ({{$Title -> firstBroadcast}})</p>
                    <a class="btn btn-primary" href="#" role="button">Watch Now</a>
                </div>
            </div>
            @empty
            <h3>Tidak ada</h3>
            @endforelse
        </div>
    </div>

    <div class="row">
        <h3>Director</h3>
        <div class="card-column">
            @forelse($byDirector as $Director)
            <div class="card">
                <img class="card-img-top" src="{{ asset('assets/img/poster.jpg') }}" alt="Card image cap">
                <div class="card-body text-center">
                    <p class="card-title">{{$Director -> title}} ({{$Director -> firstBroadcast}})</p>
                    <a class="btn btn-primary" href="#" role="button">Watch Now</a>
                </div>
            </div>
            @empty
            <h3>Tidak ada</h3>
            @endforelse
        </div>
    </div>

    <div class="row">
        <h3>Actor</h3>
        <div class="card-column">
            @forelse($byActor as $Actor)
            <div class="card">
                <img class="card-img-top" src="{{ asset('assets/img/poster.jpg') }}" alt="Card image cap">
                <div class="card-body text-center">
                    <p class="card-title">{{$Actor -> title}} ({{$Actor -> firstBroadcast}})</p>
                    <a class="btn btn-primary" href="#" role="button">Watch Now</a>
                </div>
            </div>
            @empty
            <h3>Tidak ada</h3>
            @endforelse
        </div>
    </div>

    
</div>
@endsection('content')