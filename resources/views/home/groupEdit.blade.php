@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Editing {{$group->name}}</h1>
    

    <div class="row">
    	<div class="col-md-12">
			{!! Form::open(['url' => '/edit/group']) !!}
            <div class="form-group">
              <label for="name">Name</label>
               {!! Form::text('name',$group->name,['class'=>'form-control','id'=>'name']) !!}
            </div>                  
            <div class="form-group">
              <label for="url">url</label>
               {!! Form::text('url',$group->url,['class'=>'form-control','id'=>'url']) !!}
            </div>                  
               {!! Form::hidden('group_id',$group->id) !!}                                                                       
            {!! Form::submit('Edit') !!}
            {!! Form::close() !!}
			
    	</div>
   	</div>

</div>


@endsection
