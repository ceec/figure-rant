@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Editing {{$store->name}}</h1>
    

    <div class="row">
    	<div class="col-md-12">
			{!! Form::open(['url' => '/edit/store']) !!}
            <div class="form-group">
              <label for="name">Name</label>
               {!! Form::text('name',$store->name,['class'=>'form-control','id'=>'name']) !!}
            </div>                                   
               {!! Form::hidden('store_id',$store->id) !!}                                                                       
            {!! Form::submit('Edit') !!}
            {!! Form::close() !!}
			
    	</div>
   	</div>

</div>


@endsection
