@extends('layouts.layout')

@section('title')
@parent
About - figurerant.com
@stop

@section('content')
<div class="container">
    <h2>About</h2>
    <div class="row">
        <div class="col-md-10">
            <h3>Figures: {{$figures}}</h3>
            <h3>Sold: {{$sold}}</h3>
        </div>

        <div class="col-md-2">
            <p>
                @include('display.rightsidebar')
            </p>
        </div>

    </div>
</div>
@endsection