@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Editing {{ $sale->id }}</h1>
    

    <div class="row">
      {!! Form::open(['url' => '/edit/sale']) !!}
        <div class="col-md-3">      
            <div class="form-group">
              <label for="url">Shipping USD</label>
               {!! Form::number('shipping_usd',$sale->shipping_usd,['class'=>'form-control','id'=>'url','step'=>'0.01']) !!}
            </div>   
            <div class="form-group">
              <label for="url">Total USD</label>
               {!! Form::number('total_usd',$sale->total_usd,['class'=>'form-control','id'=>'url','step'=>'0.01']) !!}
            </div>   
             {!! Form::submit('Edit') !!}    
            {!! Form::hidden('sale_id',$sale->id) !!}                                                                       
            {!! Form::close() !!}                
        </div>

        <div class="col-md-3"></div> 
        <div class="col-md-6">        
            <br><label for="name">Figures</label><br>
            @foreach($figures as $figure)
              {!! Form::open(['url' => '/edit/sale/figure']) !!}
              {{$figure->figure->figureDB->name}}<br>
              {!! Form::number('price_usd',$figure->price_usd,['class'=>'','id'=>'url','step'=>'0.01']) !!}              
              {!! Form::text('status',$figure->status,['class'=>'','id'=>'url']) !!}
              {!! Form::submit('Edit Figure') !!}    
              {!! Form::hidden('sale_figure_id',$figure->id) !!}    
               {!! Form::hidden('sale_id',$sale->id) !!}                                                                           
              {!! Form::close() !!}   

              {!! Form::open(['url' => '/remove/sale/figure']) !!}
              {!! Form::submit('X') !!}    
              {!! Form::hidden('sale_figure_id',$figure->id) !!}   
              {!! Form::hidden('sale_id',$sale->id) !!}                                                                     
              {!! Form::close() !!}                 
            @endforeach
            
            <h3>Figures</h3>    
            {!! Form::open(['url' => '/add/sale/figure']) !!}
            <div class="form-group">
              <label for="name">New Figures</label>
               {!! Form::select('sale_figure_id',$newfigures,'',['class'=>'form-control','id'=>'name']) !!}
            </div> 

            {!! Form::submit('Add Figure') !!}    
            {!! Form::hidden('sale_id',$sale->id) !!}                                                                       
            {!! Form::close() !!}                 

            <!-- Need to display figures that are already attached
            Have nice UI to add more --> 

        </div>                                                          

   	</div>

</div>


@endsection
