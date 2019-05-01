@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Add New Sale</h1>
    

    <div class="row">
    	<div class="col-md-12">
			{!! Form::open(['url' => '/add/sale']) !!}


            <div class="form-group">
              <label for="shipping_usd">Shipping</label>
               {!! Form::number('shipping_usd','',['class'=>'form-control','id'=>'shipping_usd','step'=>'0.01']) !!}
            </div>                  
			<div class="form-group">
              <label for="total_usd">Total</label>
               {!! Form::number('total_usd', '',['class'=>'form-control','id'=>'total_usd','step'=>'0.01']) !!}
            </div>                   
                                                                       
            {!! Form::submit('Add') !!}
            {!! Form::close() !!}
			
    	</div>
   	</div>

</div>


@endsection
