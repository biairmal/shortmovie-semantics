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
        <div class="col-12">
            <iframe width="840" height="472,5" src="https://www.youtube.com/embed/aqc3jFT70BI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
            </iframe>
            <div class="desc mt-3"> 
                <h1><strong>Godzilla Vs. Kong (2021)</strong></h1>
                <p>Action Movie</p>
                <p>Directed By : John Doe</p>
                <p>Cast : Joh Doe, William DOe</p>
            </div>
        </div>
    </div>
</div>
@endsection('content')