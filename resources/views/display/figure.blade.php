@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
           
            <img class="img-responsive" src="/images/nendoroids/{{$figure->url}}-released.jpg">
            @if (!Auth::guest())
							<br>
							@if($figurecheck)
								Figure Added
							@else
								{!! Form::open(['url' => '/add/user/figure']) !!}
								{!! Form::hidden('figure_id',$figure->id) !!}                                                                      
								{!! Form::submit('Add') !!}
								{!! Form::close() !!}   
							@endif
						

            @endif
        </div>    
    	<div class="col-md-9">
        <h2>{{$figure->name}}</h2>   
        Series: <a href="/group/{{$figure->group->url}}">{{$figure->group->name}}</a><br>
        Character: <a href="/character/{{$figure->character->url}}">{{$figure->character->name}}</a><br>
        Manufacturer: <a href="/manufacturer/{{$figure->manufacturer->url}}">{{$figure->manufacturer->name}}</a><br>
        Product Line: <a href="/product-line/{{$figure->productline->url}}">{{$figure->productline->name}}</a><br>
        Sculptor: <a href="/sculptor/{{$figure->sculptor->url}}">{{$figure->sculptor->name}}</a><br>
        Scale: <a href="/scale/{{$figure->scale->url}}">{{$figure->scale->name}}</a>
        </div>


    </div>
</div>
@endsection