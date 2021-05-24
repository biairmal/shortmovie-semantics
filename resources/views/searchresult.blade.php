@extends('layout')

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('assets/css/gridrsult.css') }}">
@endsection('custom_css')

@section('custom_title')
    <title>ShortMovie</title>
@endsection('custom_title')

@section('content')
<div class="container-fluid">
    @php($i=0)
    @php($countNull=0)

    @foreach($search as $searchresult)
    <div class="row">
        @if($searchresult->numRows() > 0 )
        <h3>Search "{{$varsearch}}" by {{array_keys($search)[$i]}}</h3>
        <div class="card-columns mb-5">
            @foreach($searchresult as $data)
            <div class="card">
                <img class="card-img-top" src="{{ $data->urlFoto }}" alt="Card image cap">
                <div class="card-body text-center">
                    <p class="card-title">{{$data->title}} ({{$data->firstBroadcast}})</p>
                    <a class="btn btn-primary" href="/movies/{{$data->id}}" role="button">Watch Now</a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        @php($countNull++)
        @endif
    </div>
    @php($i++)
    @endforeach

    @if($countNull >= 5)
        <h3>Film Tidak Ditemukan</h3>
    @endif
    
</div>
@endsection('content')