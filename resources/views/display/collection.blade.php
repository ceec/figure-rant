@extends('layouts.layout')

@section('title')
@parent
About - figurerant.com
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h2>Collection</h2>

            @foreach($figures as $figure)
                {{$figure->figure->name}}<br>
            @endforeach
                               
                             
        </div>
        <div class="col-md-2">
            <p>
                @include('display.rightsidebar')
            </p>
        </div>

    </div>
</div>
@endsection