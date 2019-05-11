@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Figures</h1>
    

    <div class="row">
    	<div class="col-md-12">
      @foreach($figures as $figure)
        @if ($figure->item_number != '')
            <a href="/home/figure/edit/{{$figure->id}}">{{$figure->item_number}} - {{ $figure->name }}</a><br>
        @else
            <a href="/home/figure/edit/{{$figure->id}}">{{ $figure->name }}</a><br>
        @endif
      @endforeach
			
    	</div>
   	</div>

</div>


@endsection
