@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Orders</h1>
    

    <div class="row">
    	<div class="col-md-12">
        <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Store</th>
                <th>Order ID</th>
                <th>Order Date</th>
                <th>Ship Date</th>
                <th>Figures</th>
            </tr>
        </thead>
      @foreach($orders as $order)
        <tr>
            <td><a href="/home/order/edit/{{$order->id}}">{{$order->id}}</a></td>
            <td>
                 @if ($order->store_id != 0)
                    {{ $order->store->name }}
                @else 
                    Special Event - {{ $order->store_order_id }}
                @endif           
            </td>
            <td>
                <a href="/home/order/edit/{{$order->id}}">{{ $order->store_order_id }}</a>
            </td>
            <td nowrap>
                {{ $order->order_date }}
            </td>
            <td nowrap>
                {{ $order->shipment_date }}
            </td>            
            <td>
                                            @foreach($order->orderfigures as $figure)
                                <?php 
                                    $name = substr($figure->figure->name,0,35);
                                    //$name = $figure->name;
                                ?>
                                {{$name}}<br>
                            @endforeach
            </td>
        </tr>
      @endforeach
        </table>
    	</div>
   	</div>

</div>


@endsection
