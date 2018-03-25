@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Editing {{$sculptor->name}}</h1>
    

    <div class="row">
    	<div class="col-md-12">
			{!! Form::open(['url' => '/edit/sculptor']) !!}
            <div class="form-group">
              <label for="name">Name</label>
               {!! Form::text('name',$sculptor->name,['class'=>'form-control','id'=>'name']) !!}
            </div>                  
            <div class="form-group">
              <label for="url">url</label>
               {!! Form::text('url',$sculptor->url,['class'=>'form-control','id'=>'url']) !!}
            </div>                  
               {!! Form::hidden('sculptor_id',$sculptor->id) !!}                                                                       
            {!! Form::submit('Edit') !!}
            {!! Form::close() !!}
			
    	</div>
   	</div>

</div>


@endsection
