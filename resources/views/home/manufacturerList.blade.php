@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Manufacturers</h1>
    

    <div class="row">
    	<div class="col-md-12">
      @foreach($manufacturers as $manufacturer)
        <a href="/home/manufacturer/edit/{{$manufacturer->id}}">{{ $manufacturer->name }}</a><br>

      @endforeach
			
    	</div>
   	</div>

</div>


@endsection
