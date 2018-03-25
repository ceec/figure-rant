@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Groups</h1>
    

    <div class="row">
    	<div class="col-md-12">
      @foreach($groups as $group)
        <a href="/home/group/edit/{{$group->id}}">{{ $group->name }}</a><br>

      @endforeach
			
    	</div>
   	</div>

</div>


@endsection
