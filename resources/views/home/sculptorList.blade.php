@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Sculptors</h1>
    

    <div class="row">
    	<div class="col-md-12">
      @foreach($sculptors as $sculptor)
        <a href="/home/sculptor/edit/{{$sculptor->id}}">{{ $sculptor->name }}</a><br>

      @endforeach
			
    	</div>
   	</div>

</div>


@endsection
