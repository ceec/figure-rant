@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <h1>Orders</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Shipped</th>
                    <th>Store</th>
                    <th>Figures</th>
                    <th>Status</th>
                    <th>Total &yen;</th>
                    <th>Total $</th>
                    <th>Ship &yen;</th>
                    <th>Ship $</th>    
                    <th>Type</th>                
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td><a href="{{ url('/order/'.$order->id) }}">{{$order->id}}</a></td>
                        <td>{{$order->shipment_date}}</td> 
                        @if ($order->store_id > 0)
                        <td>{{$order->store->name}}</td>
                        @else
                         <td>{{$order->store_order_id}}</td>
                        @endif
                        <td></td>
                        <td></td>
                        <td>
                            @if($order->total_yen != '0')
                                {{$order->total_yen}}
                            @endif
                        </td>
                        <td>
                            @if($order->total_usd != '0')
                                ${{$order->total_usd}}
                            @endif
                        </td>
                        <td>
                            @if($order->shipping_yen != '0')
                                {{$order->shipping_yen}}
                            @endif
                        </td>
                        <td>
                            @if($order->shipping_usd != '0')
                                ${{$order->shipping_usd}}
                            @endif
                        </td>  
                        <td>{{$order->shipment_type}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>

                        <td>
                            @foreach($order->figures as $figure)
                                <?php 
                                    //$name = substr($figure->name,0,35);
                                    $name = $figure->name;
                                ?>
                                {{$name}}<br>
                            @endforeach
                        </td>
                        <td>
                            @foreach($order->figures as $figure)
                                {{$figure->status}}
                                @if($figure->status == 'Pre-order')
                                    - {{$figure->order_date}}<br>
                                @else
                                    <br>
                                @endif
                            @endforeach
                        </td>                        
                        <td>
                            @foreach($order->figures as $figure)
                                @if($figure->price_yen != '0')
                                  {{$figure->price_yen}}
                                @endif
                                <br>
                            @endforeach
                        </td>
                        <td>
                            @foreach($order->figures as $figure)
                                @if($figure->price_usd != '0')
                                ${{$figure->price_usd}}
                                @endif
                                <br>
                            @endforeach                            
                        </td>
                        <td></td>
                        <td></td>    
                        <td></td>                    
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td><strong>Total</strong></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{$total_yen}}</td>
                        <td>${{$total_usd}}</td>
                        <td>{{$total_shipping_yen}}</td>
                        <td>${{$total_shipping_usd}}</td>    
                        <td></td>                    
                    </tr>
                </tfoot>
            </table>

   
        </div>

    </div>
</div>
@endsection