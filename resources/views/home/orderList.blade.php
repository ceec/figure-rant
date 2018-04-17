@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Orders</h1>
    

    <div class="row">
    	<div class="col-md-12">
      @foreach($orders as $order)
        <a href="/home/order/edit/{{$order->id}}">
            @if ($order->store_id != 0)
                {{ $order->store->name }} - {{ $order->store_order_id }} - {{ $order->order_date }}
            @else 
                Special Event - {{ $order->store_order_id }} - {{ $order->order_date }}
            @endif
        
        </a><br>

      @endforeach
			
    	</div>
   	</div>

</div>


@endsection
