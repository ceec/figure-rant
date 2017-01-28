@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h1>Order #{{$order->id}}</h1>

       
            @foreach($figures as $figure)
                {{$figure->name}}<br>

            @endforeach

   
        </div>
        <div class="col-md-2">
            <p>
                @include('display.rightsidebar')
            </p>
        </div>

    </div>
</div>
@endsection