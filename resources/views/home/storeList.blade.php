@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Stores</h1>
    

    <div class="row">
    	<div class="col-md-12">
      @foreach($stores as $store)
        <a href="/home/store/edit/{{$store->id}}">{{ $store->name }}</a><br>

      @endforeach
			
    	</div>
   	</div>

</div>


@endsection
