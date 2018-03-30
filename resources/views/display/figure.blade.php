@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
           
            <img class="img-responsive" src="/images/nendoroids/{{$figure->url}}-released.jpg">
        </div>    
    	<div class="col-md-9">
        <h2>{{$figure->name}}</h2>   
        Series: <a href="/group/{{$figure->group->url}}">{{$figure->group->name}}</a><br>
        Character: {{$figure->character->name}}<br>
        Manufacturer: {{$figure->manufacturer->name}}<br>
        Product Line: {{$figure->productline->name}}<br>
        Sculptor: {{$figure->sculptor->name}}<br>
        Scale: {{$figure->scale->name}}
        </div>


    </div>
</div>
@endsection