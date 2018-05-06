@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Editing {{ $order->store_id }} - {{ $order->store_order_id }} - {{ $order->order_date }}</h1>
    

    <div class="row">
    	<div class="col-md-3">
			{!! Form::open(['url' => '/edit/order']) !!}
            <div class="form-group">
              <label for="name">Store</label>
               {!! Form::select('store_id',$stores,$order->store_id,['class'=>'form-control','id'=>'name']) !!}
            </div>                  
            <div class="form-group">
              <label for="url">Order Id</label>
               {!! Form::text('store_order_id',$order->store_order_id,['class'=>'form-control','id'=>'url']) !!}
            </div>       
            <div class="form-group">
              <label for="url">Shipping Yen</label>
               {!! Form::number('shipping_yen',$order->shipping_yen,['class'=>'form-control','id'=>'url']) !!}
            </div>   
            <div class="form-group">
              <label for="url">Total Yen</label>
               {!! Form::number('total_yen',$order->total_yen,['class'=>'form-control','id'=>'url']) !!}
            </div>  
            <div class="form-group">
              <label for="url">Shipping USD</label>
               {!! Form::number('shipping_usd',$order->shipping_usd,['class'=>'form-control','id'=>'url','step'=>'0.01']) !!}
            </div>   
            <div class="form-group">
              <label for="url">Total USD</label>
               {!! Form::number('total_usd',$order->total_usd,['class'=>'form-control','id'=>'url','step'=>'0.01']) !!}
            </div>   
        </div>
        <div class="col-md-3">
            <div class="form-group">
              <label for="url">Order Date</label>
               {!! Form::date('order_date',$order->order_date,['class'=>'form-control','id'=>'url']) !!}
            </div>   
            <div class="form-group">
              <label for="url">Payment Date</label>
               {!! Form::date('payment_date',$order->payment_date,['class'=>'form-control','id'=>'url']) !!}
            </div>  
            <div class="form-group">
              <label for="url">Shipment Date</label>
               {!! Form::date('shipment_date',$order->shipment_date,['class'=>'form-control','id'=>'url']) !!}
            </div>  
            <div class="form-group">
              <label for="url">Shipment Type</label>
               {!! Form::text('shipment_type',$order->shipment_type,['class'=>'form-control','id'=>'url']) !!}
            </div>   
            <div class="form-group">
              <label for="url">Tracking Number</label>
               {!! Form::text('tracking_number',$order->tracking_number,['class'=>'form-control','id'=>'url']) !!}
            </div>                           
            <div class="form-group">
              <label for="url">Arrival Date</label>
               {!! Form::date('arrival_date',$order->arrival_date,['class'=>'form-control','id'=>'url']) !!}
            </div>     
             {!! Form::submit('Edit') !!}    
            {!! Form::hidden('order_id',$order->id) !!}                                                                       
            {!! Form::close() !!}                                                       
        </div> 
        <div class="col-md-6">
            <h3>Figures</h3>    
            {!! Form::open(['url' => '/edit/order/figure']) !!}
            <div class="form-group">
              <label for="name">New Figures</label>
               {!! Form::select('order_figure_id',$newfigures,'',['class'=>'form-control','id'=>'name']) !!}
            </div> 

            {!! Form::submit('Add Figure') !!}    
            {!! Form::hidden('order_id',$order->id) !!}                                                                       
            {!! Form::close() !!}             

            <br><label for="name">Figures</label><br>
            @foreach($figures as $figure)
              {!! Form::open(['url' => '/edit/order/figure']) !!}
              {{$figure->figure->name}}<br>
              {!! Form::number('price_yen',$figure->price_yen,['class'=>'','id'=>'url']) !!}
              {!! Form::number('price_usd',$figure->price_usd,['class'=>'','id'=>'url','step'=>'0.01']) !!}              
              {!! Form::text('status',$figure->status,['class'=>'','id'=>'url']) !!}
              {!! Form::submit('Edit Figure') !!}    
              {!! Form::hidden('order_figure_id',$figure->id) !!}    
               {!! Form::hidden('order_id',$figure->order_id) !!}                                                                           
              {!! Form::close() !!}   

              {!! Form::open(['url' => '/remove/order/figure']) !!}
              {!! Form::submit('X') !!}    
              {!! Form::hidden('order_figure_id',$figure->id) !!}   
              {!! Form::hidden('order_id',$figure->order_id) !!}                                                                     
              {!! Form::close() !!}                 
            @endforeach
            <!-- Need to display figures that are already attached
            Have nice UI to add more -->
           
        </div>                                                          

   	</div>

</div>


@endsection
