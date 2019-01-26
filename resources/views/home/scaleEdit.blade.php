@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Editing {{$scale->name}}</h1>
    

    <div class="row">
    	<div class="col-md-12">
			{!! Form::open(['url' => '/edit/scale']) !!}
            <div class="form-group">
              <label for="name">Name</label>
               {!! Form::text('name',$scale->name,['class'=>'form-control','id'=>'name']) !!}
            </div>   
            <div class="form-group">
              <label for="name">Name</label>
               {!! Form::text('url',$scale->url,['class'=>'form-control','id'=>'url']) !!}
            </div>                                               
               {!! Form::hidden('scale_id',$scale->id) !!}                                                                       
            {!! Form::submit('Edit') !!}
            {!! Form::close() !!}
			
    	</div>
   	</div>

</div>


@endsection
