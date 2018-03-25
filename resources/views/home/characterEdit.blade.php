@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Editing {{$character->name}}</h1>
    

    <div class="row">
    	<div class="col-md-12">
			{!! Form::open(['url' => '/edit/character']) !!}
            <div class="form-group">
              <label for="name">Name</label>
               {!! Form::text('name',$character->name,['class'=>'form-control','id'=>'name']) !!}
            </div>                  
            <div class="form-group">
              <label for="url">url</label>
               {!! Form::text('url',$character->url,['class'=>'form-control','id'=>'url']) !!}
            </div>      
            <div class="form-group">
              <label for="group_id">Group</label>
              {!! Form::select('group_id',$groups,$character->group_id,['class'=>'form-control', 'id'=>'group_id']) !!} 
            </div>                             
               {!! Form::hidden('character_id',$character->id) !!}                                                                       
            {!! Form::submit('Edit') !!}
            {!! Form::close() !!}
			
    	</div>
   	</div>

</div>


@endsection
