@extends('layouts.layout')

@section('title')
@parent
{{$good->name}} - figurerant.com
@stop


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
           
            <img class="img-responsive" src="/images/goods/-released.jpg">
            @if (!Auth::guest())
							<br>
							@if($goodcheck)
								Figure Added
							@else
								{!! Form::open(['url' => '/add/user/good']) !!}
								{!! Form::hidden('good_id',$good->id) !!}                                                                      
								{!! Form::submit('Add') !!}
								{!! Form::close() !!}   
							@endif
						

            @endif
        </div>    
    	<div class="col-md-9">
        <h2>{{$good->name}}</h2>   
        {{-- Series: <a href="/group/{{$good->group->url}}">{{$good->group->name}}</a><br>
        Character: <a href="/character/{{$good->character->url}}">{{$good->character->name}}</a><br>
        Manufacturer: <a href="/manufacturer/{{$good->manufacturer->url}}">{{$good->manufacturer->name}}</a><br>
        Product Line: <a href="/product-line/{{$good->productline->url}}">{{$good->productline->name}}</a><br>
        Sculptor: <a href="/sculptor/{{$good->sculptor->url}}">{{$good->sculptor->name}}</a><br>
        Scale: <a href="/scale/{{$good->scale->url}}">{{$good->scale->name}}</a> --}}
        </div>


    </div>
</div>
@endsection