@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Scales</h1>
    

    <div class="row">
    	<div class="col-md-12">
      @foreach($scales as $scale)
        <a href="/home/scale/edit/{{$scale->id}}">{{ $scale->name }}</a><br>

      @endforeach
			
    	</div>
   	</div>

</div>


@endsection
