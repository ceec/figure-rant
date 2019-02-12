@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Editing {{$manufacturer->name}}</h1>
    

    <div class="row">
    	<div class="col-md-12">
			{!! Form::open(['url' => '/edit/manufacturer']) !!}
            <div class="form-group">
              <label for="name">Name</label>
               {!! Form::text('name',$manufacturer->name,['class'=>'form-control','id'=>'name']) !!}
            </div>   
            <div class="form-group">
              <label for="url">Url</label>
               {!! Form::text('url',$manufacturer->url,['class'=>'form-control','id'=>'url']) !!}
            </div>                                               
               {!! Form::hidden('manufacturer_id',$manufacturer->id) !!}                                                                       
            {!! Form::submit('Edit') !!}
            {!! Form::close() !!}
			
    	</div>
   	</div>

</div>


@endsection
