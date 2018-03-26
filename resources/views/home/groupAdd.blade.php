@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Add New Group</h1>
    

    <div class="row">
    	<div class="col-md-12">
			{!! Form::open(['url' => '/add/group']) !!}


            <div class="form-group">
              <label for="name">Name</label>
               {!! Form::text('name','',['class'=>'form-control','id'=>'name']) !!}
            </div>                  
            <div class="form-group">
              <label for="url">url</label>
               {!! Form::text('url','',['class'=>'form-control','id'=>'url']) !!}
            </div>                  
                                                                       
            {!! Form::submit('Add') !!}
            {!! Form::close() !!}
			
    	</div>
   	</div>

</div>


@endsection