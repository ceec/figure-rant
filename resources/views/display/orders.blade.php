@extends('layouts.layout')

@section('title')
@parent
Orders - figurerant.com
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <h1>Orders</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Orderd</th>
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
                        <td style="white-space: nowrap">{{$order->order_date}}</td> 
                        <td style="white-space: nowrap">
                            @if (($order->shipment_date != '0000-00-00') && ($order->shipment_date != '2000-01-01'))
                                {{$order->shipment_date}}
                            @endif
                        </td> 
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
                        <td><a href="https://trackings.post.japanpost.jp/services/srv/search/?requestNo1={{$order->tracking_number}}&requestNo2=&requestNo3=&requestNo4=&requestNo5=&requestNo6=&requestNo7=&requestNo8=&requestNo9=&requestNo10=&search.x=0&search.y=0&search=Tracking+start&locale=en&startingUrlPatten=">{{$order->tracking_number}}</a></td>
                        <td></td>

                        <td>
                            @foreach($order->orderfigures as $figure)
                                <?php 
                                    $name = substr($figure->figure->name,0,35);
                                    //$name = $figure->name;
                                ?>
                                {{$name}}<br>
                            @endforeach
                        </td>
                        <td style="white-space: nowrap">
                            @foreach($order->orderfigures as $figure)
                                {{$figure->status}}
                                @if($figure->status == 'Pre-order')
                                    - {{$order->order_date}}<br>
                                @else
                                    <br>
                                @endif
                            @endforeach
                        </td>                        
                        <td>
                            @foreach($order->orderfigures as $figure)
                                @if($figure->price_yen != '0')
                                  {{$figure->price_yen}}
                                @endif
                                <br>
                            @endforeach
                        </td>
                        <td>
                            @foreach($order->orderfigures as $figure)
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