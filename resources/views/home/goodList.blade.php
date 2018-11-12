@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Goods</h1>
    

    <div class="row">
    	<div class="col-md-12">
      @foreach($goods as $good)
        @if ($good->item_number != '')
            <a href="/home/good/edit/{{$good->id}}">{{$good->item_number}} - {{ $good->name }}</a><br>
        @else
            <a href="/home/good/edit/{{$good->id}}">{{ $good->name }}</a><br>
        @endif
      @endforeach
			
    	</div>
   	</div>

</div>


@endsection
