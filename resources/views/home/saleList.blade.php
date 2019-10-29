@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Sales</h1>
    

    <div class="row">
    	<div class="col-md-12">
        <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Sale Date</th>
                <th>Total</th>
                <th>Shipping</th>
                <th>Ship Date</th>
                <th>Figures</th>
            </tr>
        </thead>
      @foreach($sales as $sale)
        <tr>
            <td><a href="/home/sale/edit/{{$sale->id}}">{{$sale->id}}</a></td>
            <td> {{date('Y-m-d',strtotime($sale->created_at))}}</td>
            <td>{{$sale->total_usd}}</td>
            <td>{{$sale->shipping_usd}}</td>
            <td></td>
            <td>
                @foreach($sale->salefigures as $figure)

                {{$figure->figure}}<br>
                    <?php 
                       // $name = substr($figure->figure->figureDB->name,0,35);
                       //{{$figure->price_usd}} {{$name}}<br>
                    ?>
                    
                @endforeach

            </td>
        </tr>
      @endforeach
        </table>
    	</div>
   	</div>

</div>


@endsection
