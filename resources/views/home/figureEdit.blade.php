@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Editing {{$figure->name}}</h1>
    <h3><a href="/home/figure/list">Edit List</a></h3>

    <div class="row">
        <div class="col-md-3">
            <img class="img-responsive" src="/images/nendoroids/{{$figure->url}}-released.jpg">
        </div>    
    	<div class="col-md-9">
			{!! Form::open(['url' => '/edit/figure']) !!}
            <div class="form-group">
              <label for="name">Name</label>
               {!! Form::text('name',$figure->name,['class'=>'form-control','id'=>'name']) !!}
            </div>   
            <div class="form-group">
              <label for="url">url </label>
               {!! Form::text('url',$figure->url,['class'=>'form-control','id'=>'url']) !!}
            </div>              
            <div class="form-group">
              <label for="released">Released</label>
              {!! Form::select('released',[0,1],$figure->released,['class'=>'form-control', 'id'=>'released']) !!} 
            </div>                 
            {!! Form::hidden('figure_id',$figure->id) !!}                                                                       
            {!! Form::submit('Edit') !!}
            {!! Form::close() !!}
    	</div>

   	</div>
</div>


@endsection
