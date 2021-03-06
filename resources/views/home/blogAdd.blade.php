@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Add New Blog Post</h1>
    

    <div class="row">
    	<div class="col-md-12">
			{!! Form::open(['url' => '/add/blog']) !!}


            <div class="form-group">
              <label for="japanese-name">Title</label>
               {!! Form::text('title','',['class'=>'form-control','id'=>'title']) !!}
            </div>                  
			      <div class="form-group">
              <label for="type">Type</label>
               {!! Form::select('type',array('rant' => 'rant', 'haul' => 'haul','news' => 'news','review'=>'review'), 'rant',['class'=>'form-control','id'=>'type']) !!}
            </div>   
            <div class="form-group">
              <label for="s-name">Content</label>
               {!! Form::textarea('content','',['class'=>'form-control','id'=>'content']) !!}
            </div>    
            <div class="form-group">
              <label for="image">Image - Not Required most probably wont have one</label>
               {!! Form::text('image','',['class'=>'form-control','id'=>'image']) !!}
            </div>
            <div class="form-group">
              <label for="url">Url Slug - URL friendly characters (no spaces just characters) eg this-is-a-good-url </label>
               {!! Form::text('url','',['class'=>'form-control','id'=>'url']) !!}
            </div>                  
                                                                       
            {!! Form::submit('Add') !!}
            {!! Form::close() !!}
			
    	</div>
   	</div>

</div>


@endsection
