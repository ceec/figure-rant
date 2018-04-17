@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h1>Order #{{$order->id}}</h1>

       
            @foreach($order->orderfigures as $figure)
                <a href="/figure/{{$figure->figure->url}}">{{$figure->figure->name}}</a><br>

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