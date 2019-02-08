@extends('layouts.layout')

@section('title')
@parent
Pre-orders - figurerant.com
@stop

@section('content')
<style>
  .preorder{
    margin: 10px;
  }
  </style>
<div class="container">
    <div class="row">
        <h1>Pre-orders</h1>
        @foreach($preorders as $order)
          @foreach($order->orderfigures as $figure)
          <div class="col-md-5 preorder">
            <div class="row">
              <div class="col-md-6">
                <img class="img-responsive" height="200" src="/images/{{$figure->figure->imageFolder()}}/{{$figure->figure->url}}-released.jpg">
              </div>
              <div class="col-md-6">
<?php 
            $name = substr($figure->figure->name,0,35);
            //$name = $figure->name;
?>
            <a href="/figure/{{$figure->figure->url}}">{{$name}}</a><br>     
            Release date: {{date('F Y',strtotime($figure->figure->available_release_date))}}<br>
            Order date: {{$order->order_date}}      
              </div>
            </div>
          </div>
          @endforeach

        @endforeach

    </div>
</div>
@endsection