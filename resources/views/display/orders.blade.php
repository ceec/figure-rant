@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
        <h1>Orders</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Ship Date</th>
                    <th>Store</th>
                    <th>Figures</th>
                    <th>Status</th>
                    <th>Total Yen</th>
                    <th>Total USD</th>
                    <th>Shipping Yen</th>
                    <th>Shipping USD</th>                    
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td><a href="{{ url('/order/'.$order->id) }}">{{$order->id}}</a></td>
                        <td>{{$order->shipment_date}}</td> 
                        <td>{{$order->store()->get()}}</td>
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
                        </td>                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>

                        <td>
                            @foreach($order->figures as $figure)
                                <?php 
                                    $name = substr($figure->name,0,35);

                                ?>
                                {{$name}}<br>
                            @endforeach
                        </td>
                        <td>
                            @foreach($order->figures as $figure)
                                {{$figure->status}}
                                @if($figure->status == 'Pre-order')
                                    - {{$figure->preorder_date}}<br>
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
                    </tr>
                </tfoot>
            </table>

   
        </div>
        <div class="col-md-2">
            <p>
                @include('display.rightsidebar')
            </p>
        </div>

    </div>
</div>
@endsection