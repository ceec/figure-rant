@extends('layouts.app')

@section('content')
<style>
  .figure-edit {
    padding-right: 0px;
  }

  .figure-edit-inner {
    padding-right: 0px;
    padding-left: 0px;
  }
  </style>
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
            <br><label for="name">Figures</label><br>
            @foreach($figures as $figure)
              {!! Form::open(['url' => '/edit/user/figure']) !!}
              <a href="/figure/{{$figure->userfigure->figureDB->url}}">{{$figure->userfigure->figureDB->name}}</a><br>
              <div class="row">
                <div class="col-md-2">
                  {!! Form::number('price_yen',$figure->userfigure->price_yen,['class'=>'form-control input-sm','id'=>'price_yen']) !!}
                </div>
                <div class="col-md-2">
                  {!! Form::number('price_usd',$figure->userfigure->price_usd,['class'=>'form-control input-sm','id'=>'price_usd','step'=>'0.01']) !!}              
                </div>
                <div class="col-md-4">
                  {!! Form::text('condition',$figure->userfigure->condition,['class'=>'form-control input-sm','id'=>'condition']) !!}
                </div>
                <div class="col-md-4">
                  {!! Form::date('order_date',$figure->userfigure->order_date,['class'=>'form-control input-sm','id'=>'order_date']) !!}
                </div>     
                <div class="col-md-3">                                           
              {!! Form::submit('Edit Figure',['class'=>'btn btn-success']) !!}    
                </div>
              {!! Form::hidden('status',$figure->userfigure->status) !!}   
              {!! Form::hidden('figure_id',$figure->userfigure->id) !!}
              {!! Form::hidden('figuredb_id',$figure->userFigure->figureDB->id) !!}
              {!! Form::hidden('order_id',$figure->order_id) !!}    
              {!! Form::close() !!}   

              {!! Form::open(['url' => '/remove/order/figure']) !!}
                <div class="col-md-1 figure-edit-inner">
                  {!! Form::submit('X',['class'=>'btn btn-danger']) !!}    
                </div>
                {!! Form::hidden('order_figure_id',$figure->id) !!}   
                {!! Form::hidden('order_id',$figure->order_id) !!}                                                                     
              {!! Form::close() !!}    
            </div> <!-- end row for figure options -->             
            @endforeach

            <br><label for="name">Goods</label><br>
            @foreach($goods as $good)
              {!! Form::open(['url' => '/edit/order/good']) !!}
              {{$good->good->name}}<br>
              {!! Form::number('price_yen',$good->price_yen,['class'=>'','id'=>'url']) !!}
              {!! Form::number('price_usd',$good->price_usd,['class'=>'','id'=>'url','step'=>'0.01']) !!}              
              {!! Form::text('status',$good->status,['class'=>'','id'=>'url']) !!}
              {!! Form::submit('Edit Good') !!}    
              {!! Form::hidden('order_good_id',$good->id) !!}    
               {!! Form::hidden('order_id',$good->order_id) !!}                                                                           
              {!! Form::close() !!}   

              {!! Form::open(['url' => '/remove/order/good']) !!}
              {!! Form::submit('X') !!}    
              {!! Form::hidden('order_good_id',$good->id) !!}   
              {!! Form::hidden('order_id',$good->order_id) !!}                                                                     
              {!! Form::close() !!}                 
            @endforeach  
            
            <h3>Figures</h3>    
            {!! Form::open(['url' => '/edit/order/figure']) !!}
            <div class="form-group">
              <label for="name">New Figures</label>
               {!! Form::select('order_figure_id',$newfigures,'',['class'=>'form-control','id'=>'name']) !!}
            </div> 

            {!! Form::submit('Add Figure') !!}    
            {!! Form::hidden('order_id',$order->id) !!}                                                                       
            {!! Form::close() !!}                 

            <!-- Need to display figures that are already attached
            Have nice UI to add more -->
            <h3>Goods</h3>    
            {!! Form::open(['url' => '/edit/order/good']) !!}
            <div class="form-group">
              <label for="name">New Goods</label>
               {!! Form::select('order_good_id',$newgoods,'',['class'=>'form-control','id'=>'name']) !!}
            </div> 

            {!! Form::submit('Add Good') !!}    
            {!! Form::hidden('order_id',$order->id) !!}                                                                       
            {!! Form::close() !!}    

        </div>                                                          

   	</div>

</div>


@endsection
