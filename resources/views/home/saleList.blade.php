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
                <th>Store</th>
                <th>Order ID</th>
                <th>Order Date</th>
                <th>Ship Date</th>
                <th>Figures</th>
            </tr>
        </thead>
      @foreach($sales as $sale)
        <tr>
            <td><a href="/home/sale/edit/{{$sale->id}}">{{$sale->id}}</a></td>
            <td>        
            </td>
            <td>
            </td>
            <td nowrap>

            </td>
            <td nowrap>

            </td>            
            <td>

            </td>
        </tr>
      @endforeach
        </table>
    	</div>
   	</div>

</div>


@endsection
