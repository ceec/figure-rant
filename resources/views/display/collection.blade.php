@extends('layouts.layout')

@section('title')
@parent
About - figurerant.com
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Collection</h2>

            @foreach($figures as $figure)
                {{$figure->figureDB->name}}<br>
            @endforeach
                               
                             
        </div>
    </div>
</div>
@endsection