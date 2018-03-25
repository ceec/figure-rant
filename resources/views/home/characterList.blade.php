@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Characters</h1>
    

    <div class="row">
    	<div class="col-md-12">
      @foreach($characters as $character)
        <a href="/home/character/edit/{{$character->id}}">{{ $character->name }}</a><br>

      @endforeach
			
    	</div>
   	</div>

</div>


@endsection
