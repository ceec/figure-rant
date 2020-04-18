@extends('layouts.layout')

@section('title')
@parent
{{$figure->name}} - figurerant.com
@stop


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
           
            <img class="img-responsive" src="/images/{{$figure->imageFolder()}}/{{$figure->url}}-released.jpg">
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
    <div class="row">
        <div class="col-md-6">
            @if (!Auth::guest())
                <br>
                @if($figurecheck)
                    {!! Form::open(['url' => '/edit/user/figure']) !!}
                        Status:
                        {!! Form::select('status',$status,$figurecheck->status,['class'=>'form-control', 'id'=>'status']) !!}
                        <div class="row">
                            <div class="col-md-6">
                                Price Yen: 
                                {!! Form::number('price_yen',$figurecheck->price_yen,['class'=>'form-control','id'=>'price_yen']) !!}
                            </div>
                            <div class="col-md-6">
                                Price USD:
                                {!! Form::number('price_usd',$figurecheck->price_usd,['class'=>'form-control input-sm','id'=>'price_usd','step'=>'0.01','value'=>'0.0']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                Condition: 
                                {!! Form::text('condition',$figurecheck->condition,['class'=>'form-control input-sm','id'=>'condition']) !!}
                            </div>
                            <div class="col-md-6">
                                Order Date:
                                {!! Form::date('order_date',$figurecheck->order_date,['class'=>'form-control input-sm','id'=>'order_date']) !!}
                            </div>
                        </div>
                                {!! Form::hidden('figuredb_id',$figure->id) !!}    
                                {!! Form::hidden('figure_id',$figurecheck->id) !!}                             
                                       
                                {!! Form::submit('Edit Figure',['class'=>'btn btn-success']) !!}                        
                                {!! Form::close() !!}   

							@else
								{!! Form::open(['url' => '/add/user/figure']) !!}
								{!! Form::hidden('figure_id',$figure->id) !!}                                                                      
								{!! Form::submit('Add') !!}
								{!! Form::close() !!}   
							@endif
						

            @endif    
                            </div>    
    </div>
</div>
@endsection